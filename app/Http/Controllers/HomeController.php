<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Governorate;
use App\Models\Locality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Content::where('type', 1)->latest('id')->limit(5)->get();
        return view('home', compact('articles'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }

    public function getGovernorateLocalities(Governorate $governorate)
    {
        return $governorate->localities->pluck('Locality_Name_A', 'Locality_ID');
    }

    public function getLocalityVillages(Locality $locality)
    {
        return $locality->villages->pluck('Village_Name_A', 'Village_ID');
    }
}
