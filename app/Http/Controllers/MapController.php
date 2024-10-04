<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        $components = json_decode(file_get_contents(storage_path('app/data.json')), true)['components'];

        return view('map', compact('components'));
    }
}
