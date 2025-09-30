<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.contact-list', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.contact-add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable',
        ]);

        Contact::create($validated);
        return redirect()->route('contact_list')->with('success', 'The Contact page info has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact, $id)
    {
        $e_contact = Contact::findOrFail($id);
        return view('admin.contact.contact-add-edit', compact('e_contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable',
        ]);

        $contact->update($validated);
        return redirect()->route('contact_list')->with('success', 'The Contact page info has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
