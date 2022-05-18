<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BinderByteTrackerService
{
    protected $tracking_code, $courier, $result;

    public function http($path, $params = [])
    {

        $fullurl = config('services.binderbyte.url').$path;
        $query_params = array_merge($params, [
            'api_key'   => config('services.binderbyte.api_key')
        ]);
        // dd($fullurl, $query_params);

        $request = Http::get($fullurl, $query_params);

        $response = $request->object();

        return $response;

    }

    public function track($tracking_code, $result)
    {

    }



    public function list_courier()
    {

    }

    public function status()
    {

    }
}
