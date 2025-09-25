<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home-banner.home-banner-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-banner.home-banner-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:webp|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('home-banners', 'public');
        }

        HomeBanner::create($validated);
        return redirect()->route('home_banner_list')->with('success', 'The home banner has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $e_homeBanner = HomeBanner::findOrFail($id);
        return view('admin.home-banner.home-banner-add-edit', compact('e_homeBanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBanner $homeBanner, $id)
    {
        $homeBanner = HomeBanner::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:webp|max:1024',
        ]);

        if ($request->hasFile('image')) {
            if ($homeBanner->image && \Storage::disk('public')->exists($homeBanner->image)) {
                \Storage::disk('public')->delete($homeBanner->image);
            }
            $validated['image'] = $request->file('image')->store('home-banners', 'public');
        }

        $homeBanner->update($validated);
        return redirect()->route('home_banner_list')->with('success', 'The home banner has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $homeBanner, $id)
    {
        $homeBanner = HomeBanner::findOrFail($id);
        $homeBanner->delete();
        return redirect()->back()->with('success', 'The home banner has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getHomeBanners(Request $request, HomeBanner $homeBanner)
    {
        $hobeBanner = HomeBanner::where('status', 1)->latest('id')->get();
        return response()->json(['data' => $hobeBanner]);
    }
}
