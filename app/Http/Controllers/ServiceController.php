<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.service-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.service-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
        ]);

        Service::create($validated);
        return redirect()->route('service_list')->with('success', 'The service has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service, $id)
    {
        $e_service = Service::findOrFail($id);
        return view('admin.service.service-add-edit', compact('e_service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
        ]);

        $service->update($validated);
        return redirect()->route('service_list')->with('success', 'The service has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service, $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success', 'The service has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getservices(Request $request, Service $service)
    {
        $service = Service::where('status', 1)->latest('id')->get();
        return response()->json(['data' => $service]);
    }
}
