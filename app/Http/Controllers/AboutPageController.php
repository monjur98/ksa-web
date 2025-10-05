<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('website.about', compact('about'));
    }
}
