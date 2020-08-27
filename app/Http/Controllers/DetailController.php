<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\travelPackages;

class DetailController extends Controller
{
    public function index(request $request, $slug){
        $item = travelPackages::with('galleries')->where('slug', $slug)->firstOrFail();

        return view('pages.detail', [
            'item' => $item
        ]);
    }

}
