<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.feature.feature-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feature.feature-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required',
        ]);

        Feature::create($validated);
        return redirect()->route('feature_list')->with('success', 'The feature has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $e_feature = Feature::findOrFail($id);
        return view('admin.feature.feature-add-edit', compact('e_feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature, $id)
    {
        $feature = Feature::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $feature->update($validated);
        return redirect()->route('feature_list')->with('success', 'The feature has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature, $id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->back()->with('success', 'The feature has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getFeatures(Request $request, Feature $feature)
    {
        $feature = Feature::where('status', 1)->latest('id')->get();
        return response()->json(['data' => $feature]);
    }
}
