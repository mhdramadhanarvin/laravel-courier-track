<?php

namespace App\Services;

use Exception;
use PhpParser\Node\Expr\Throw_;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class BinderByteTrackerService
{
    private $url, $api_key;

    public function __construct()
    {
        $this->url = config('services.binderbyte.url');
        $this->api_key = config('services.binderbyte.api_key');
    }

    private function http($path, $params = [])
    {
        try {
            $fullurl = $this->url.$path;
            $query_params = array_merge($params, [
                'api_key'   => $this->api_key
            ]);
            $request = Http::get($fullurl, $query_params);
            $response = $request->object();
            // $request->throw();
            // return $response;
            return $request->throw(function ($response, $e) {
                throw new Exception($e->getMessage());
            })->json();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function track($courier, $tracking_code)
    {
        return $this->http('v1/track', [
            'courier' => $courier,
            'awb' => $tracking_code
        ]);
    }

    public function list_courier()
    {
        return $this->http('v1/list_courier');
    }
}
