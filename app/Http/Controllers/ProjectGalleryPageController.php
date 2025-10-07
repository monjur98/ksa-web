<?php

namespace App\Http\Controllers;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class ProjectGalleryPageController extends Controller
{
    public function index()
    {
        $projects = ProjectGallery::where('status', 1)->latest('id')->get();
        return view('website.project-gallery', compact('projects'));
    }
}
