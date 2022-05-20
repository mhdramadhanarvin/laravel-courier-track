<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ValidTrackRequest;
use App\Services\BinderByteTrackerService;

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
        $validated = $request->validated();
        // return (new BinderByteTrackerService())->http('v1/track', ['courier' => 'jnt', 'awb' => 'JP0198497048']);
        $tracking_data = (new BinderByteTrackerService())->track($request->courier, $request->tracking_code);

        return view('result', ['data' => $tracking_data]);
    }
}
