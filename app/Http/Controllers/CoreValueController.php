<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.core-value.core-value-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.core-value.core-value-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        CoreValue::create($validated);
        return redirect()->route('core_value_list')->with('success', 'The core value has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CoreValue $coreValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $e_coreValue = CoreValue::findOrFail($id);
        return view('admin.core-value.core-value-add-edit', compact('e_coreValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoreValue $coreValue, $id)
    {
        $coreValue = CoreValue::findOrFail($id);

        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $coreValue->update($validated);
        return redirect()->route('core_value_list')->with('success', 'The core value has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoreValue $coreValue, $id)
    {
        $coreValue = CoreValue::findOrFail($id);
        $coreValue->delete();
        return redirect()->back()->with('success', 'The core value has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getCoreValues(Request $request, CoreValue $coreValue)
    {
        $coreValue = CoreValue::where('status', 1)->latest('id')->get();
        return response()->json(['data' => $coreValue]);
    }
}
