<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidTrackRequest;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function track(ValidTrackRequest $request)
    {
        $validated = $request->validated();
        // dd($request->all());
    }
}
