<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ValidTrackRequest;
use App\Services\BinderByteTrackerService;
use Exception;

class TrackController extends Controller
{
    public function home()
    {
        $getFromCache = Cache::get('listCourier');
        $listCourier = json_decode($getFromCache);
        if (!$getFromCache) {
            $listCourier = (new BinderByteTrackerService)->list_courier();
            Cache::put('listCourier', json_encode($listCourier));
        }

        return view('home', ['couriers' => $listCourier]);
    }

    public function track(ValidTrackRequest $request)
    {
        // (new BinderByteTrackerService())->http('v1/track', ['courier' => 'jnt', 'awb' => 'JP0198497048']);
        try {
            $validated = $request->validated();
            $courier = $request->courier;
            $tracking_code = $request->tracking_code;
            $cache_key = $courier . '_' . $tracking_code;
            $tracking_data = Cache::get($cache_key);
            if (!$tracking_data) {
                $tracking_data = (new BinderByteTrackerService())->track($courier, $tracking_code)->data;
                Cache::put($cache_key, $tracking_data, now()->addHour());
            }

            return view('result', ['data' => $tracking_data]);

        } catch (Exception $e) {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('Server', 'Internal server error, try again later!');
            return redirect()->route('home')->withErrors($errors);
        }
    }
}
