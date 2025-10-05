<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\Service;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bannerQTY = HomeBanner::count();
        $serviceQTY = Service::count();
        $projectQTY = ProjectGallery::count();
        return view('admin.dashboard', compact('bannerQTY', 'serviceQTY', 'projectQTY'));
    }
}
