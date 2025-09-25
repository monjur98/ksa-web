<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectGalleryPageController extends Controller
{
    public function index()
    {
        return view('website.project-gallery');
    }
}
