<?php

namespace App\Http\Controllers;

use App\Models\ProjectGalleryType;
use Illuminate\Http\Request;

class ProjectGalleryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectGalleryType = ProjectGalleryType::latest('id')->get();
        return view('admin.project-gallery-type.project-gallery-type-add-edit-view', compact('projectGalleryType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
           'status' => 'nullable|in:0,1',
        ]);

        ProjectGalleryType::create($validated);
        return redirect()->back()->with('success', 'Project Gallery Type has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectGalleryType $projectGalleryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectGalleryType $projectGalleryType, $id)
    {
        $e_PGT = ProjectGalleryType::findOrFail($id);
        return view('admin.project-gallery-type.project-gallery-type-add-edit-view', compact('e_PGT'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectGalleryType $projectGalleryType, $id)
    {
        $projectGalleryType = ProjectGalleryType::findOrFail($id);
        $validated = $request->validate([
            'type' => 'required|string|max:255',
           'status' => 'nullable|in:0,1',            
        ]);

        $projectGalleryType->update($validated);
        return redirect()->route('project_gallery_type_list')->with('success', 'Project Gallery Type has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGalleryType $projectGalleryType)
    {
        //
    }
}
