<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidTrackRequest;
use App\Services\BinderByteTrackerService;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function track(ValidTrackRequest $request)
    {
        $validated = $request->validated();
        return (new BinderByteTrackerService())->http('v1/track', ['courier' => 'jnt', 'awb' => 'JP0198497048']);
    }
}
