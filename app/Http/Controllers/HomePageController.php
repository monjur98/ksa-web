<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\Feature;
use App\Models\CoreValue;
use App\Models\Service;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $banner = HomeBanner::where('status', 1)->get();
        $feature = Feature::where('status', 1)->get();
        $coreValue = CoreValue::where('status', 1)->get();
        $service = Service::where('status', 1)->get();
        return view('website.home', compact('banner', 'feature', 'coreValue', 'service'));
    }
}
