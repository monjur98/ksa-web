<?php

namespace App\Http\Controllers;

use App\Models\CompanyGallery;
use Illuminate\Http\Request;

class CompanyGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.company-gallery.company-gallery-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company-gallery.company-gallery-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'image' => 'required|image|mimes:webp|max:1024',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('company-gallery', 'public');
        }

        CompanyGallery::create($validated);
        return redirect()->route('company_gallery_list')->with('success', 'The gallery image has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyGallery $companyGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyGallery $companyGallery, $id)
    {
        $e_companyGallery = CompanyGallery::findOrFail($id);
        return view('admin.company-gallery.company-gallery-add-edit', compact('e_companyGallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyGallery $companyGallery, $id)
    {
        $companyGallery = CompanyGallery::findOrFail($id);

        $validated = $request->validate([
            'description' => 'required',
            'image' => 'nullable|image|mimes:webp|max:1024',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            if ($companyGallery->image && \Storage::disk('public')->exists($companyGallery->image)) {
                \Storage::disk('public')->delete($companyGallery->image);
            }
            $validated['image'] = $request->file('image')->store('company-gallery', 'public');
        }

        $companyGallery->update($validated);
        return redirect()->route('company_gallery_list')->with('success', 'The gallery image has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyGallery $companyGallery, $id)
    {
        $companyGallery = CompanyGallery::findOrFail($id);
        $companyGallery->delete();
        return redirect()->back()->with('success', 'The gallery image has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getCompanyGallerys(Request $request, CompanyGallery $companyGallery)
    {
        $companyGallery = CompanyGallery::latest('id')->get();
        return response()->json(['data' => $companyGallery]);
    }
}
