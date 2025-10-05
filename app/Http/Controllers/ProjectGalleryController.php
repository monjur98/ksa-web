<?php

namespace App\Http\Controllers;

use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.project-gallery.project-gallery-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-gallery.project-gallery-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',
            'project_pdf' => 'required|mimes:pdf',
            'status' => 'nullable|in:0,1',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Handle PDF upload
        if ($request->hasFile('project_pdf')) {
            $validated['project_pdf'] = $request->file('project_pdf')->store('projectPDF', 'public');
        }

        ProjectGallery::create($validated);
        return redirect()->route('project_gallery_list')->with('success', 'The project has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectGallery $projectGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectGallery $projectGallery, $id)
    {
        $e_project = ProjectGallery::findOrFail($id);
        return view('admin.project-gallery.project-gallery-add-edit', compact('e_project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectGallery $projectGallery)
    {
        $projectGallery = ProjectGallery::findOrFail($id);

        $validated = $request->validate([
            'type_id' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'project_pdf' => 'required|mimes:pdf',
            'status' => 'nullable|in:0,1',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($homeBanner->thumbnail && \Storage::disk('public')->exists($homeBanner->thumbnail)) {
                \Storage::disk('public')->delete($homeBanner->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('project_pdf')) {
            if ($homeBanner->project_pdf && \Storage::disk('public')->exists($homeBanner->project_pdf)) {
                \Storage::disk('public')->delete($homeBanner->project_pdf);
            }
            $validated['project_pdf'] = $request->file('project_pdf')->store('projectPDF', 'public');
        }

        $projectGallery->update($validated);
        return redirect()->route('project_gallery_list')->with('success', 'The project has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGallery $projectGallery, $id)
    {
        $projectGallery = ProjectGallery::findOrFail($id);
        $projectGallery->delete();
        return redirect()->back()->with('success', 'The project has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getProjectGallerys(ProjectGallery $projectGallery)
    {
        $projectGallery = ProjectGallery::with('type')->latest('id')->get();
        return response()->json(['data' => $projectGallery]);
    }
}
