<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.career.career-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.career.career-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'vacancies' => 'required|integer|min:1',
            'experience' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:0,1',
        ]);

        Career::create($validated);
        return redirect()->route('career_list')->with('success', 'The job post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career, $id)
    {
        $e_career = Career::findOrFail($id);
        return view('admin.career.career-add-edit', compact('e_career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career, $id)
    {
        $career = Career::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'vacancies' => 'required|integer|min:1',
            'experience' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $career->update($validated);
        return redirect()->route('career_list')->with('success', 'The job post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career, $id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
        return redirect()->back()->with('success', 'The job post has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getCareers(Request $request, Career $career)
    {
        $career = Career::latest('id')->get();
        return response()->json(['data' => $career]);
    }
}
