<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function track(Request $request) 
    {
        dd($request->all());
    }
}
