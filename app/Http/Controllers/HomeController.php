<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\travelPackages;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $items = travelPackages::with('galleries')->get();
        return view('pages.home', [
            'items' => $items
        ]);
    }

    public function package(Request $request)
    {
        $items = travelPackages::with('galleries')->get();
        return view('pages.package', [
            'items' => $items,
        ]);
    }

    public function search(Request $request)
    {
        $cari = $request->location;
        $items = travelPackages::with(['galleries'])->where('location','LIKE',"%".$cari."%")->get();
        return view('pages.package', [
            'items' => $items
        ]);
    }
}
