<?php

namespace App\Http\Controllers;
use App\Models\CompanyGallery;
use Illuminate\Http\Request;

class CompanyGalleryPageController extends Controller
{
    public function index()
    {
        $companyGallery = CompanyGallery::where('status', 1)->get();
        return view('website.company-gallery', compact('companyGallery'));
    }
}
