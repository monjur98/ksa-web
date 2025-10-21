<?php

namespace App\Http\Controllers;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerPageController extends Controller
{
    public function index()
    {
        $careers = Career::where('status', 1)->get();
        return view('website.career', compact('careers'));
    }
}
