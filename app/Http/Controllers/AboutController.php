<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.about-list', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.about-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'about' => 'nullable',
            'mission_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:1024',
            'mission' => 'nullable',
            'vision_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:1024',
            'vision' => 'nullable',
        ]);

        if ($request->hasFile('mission_image')) {
            $validated['mission_image'] = $request->file('mission_image')->store('mission', 'public');
        }
        if ($request->hasFile('vision_image')) {
            $validated['vision_image'] = $request->file('vision_image')->store('vision', 'public');
        }

        About::create($validated);
        return redirect()->route('about_list')->with('success', 'The About page info has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $e_about = About::findOrFail($id);
        return view('admin.about.about-add-edit', compact('e_about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about, $id)
    {
        $about = About::findOrFail($id);
        $validated = $request->validate([
            'about' => 'nullable',
            'mission_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:1024',
            'mission' => 'nullable',
            'vision_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:1024',
            'vision' => 'nullable',
        ]);

        if ($request->hasFile('mission_image')) {
            if ($about->mission_image && \Storage::disk('public')->exists($about->mission_image)) {
                \Storage::disk('public')->delete($about->mission_image);
            }
            $validated['mission_image'] = $request->file('mission_image')->store('mission', 'public');
        }

        if ($request->hasFile('vision_image')) {
            if ($about->vision_image && \Storage::disk('public')->exists($about->vision_image)) {
                \Storage::disk('public')->delete($about->vision_image);
            }
            $validated['vision_image'] = $request->file('vision_image')->store('vision', 'public');
        }

        $about->update($validated);
        return redirect()->route('about_list')->with('success', 'The About page has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
