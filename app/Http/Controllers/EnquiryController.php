<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.enquiry.enquiry-list');
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
    public function storeQuote(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'subject' => 'required|string',
            'reason' => 'required|string',
            'status' => 'nullable',
        ]);

        // Save the enquiry
        Enquiry::create($validated);

        // Send the email
        Mail::send(
            'mails.mail-quote',
            [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'reason' => $validated['reason'],
            ],
            function ($message) {
                $message->to('rana.devweb@gmail.com')->subject('New Quote Request Submitted');
            },
        );

        // Redirect with success message
        return redirect()->back()->with('success', 'Your enquiry has been received. Our team will contact you shortly.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'status' => 'nullable',
        ]);

        // Save the enquiry
        Enquiry::create($validated);

        // Send the email
        Mail::send(
            'mails.mail-contact',
            [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'note' => $validated['message'],
            ],
            function ($message) {
                $message->to('rana.devweb@gmail.com')->subject('New Contact Form Submitted');
            },
        );

        // Redirect with success message
        return redirect()->back()->with('success', 'Your enquiry has been received. Our team will contact you shortly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enquiry $enquiry, $id)
    {
        $e_enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiry.enquiry-add-edit', compact('e_enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enquiry $enquiry, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update([
            'status' => $request->status,
        ]);
        return redirect()->route('enquiry_list')->with('success', 'Status has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enquiry $enquiry, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->back()->with('success', 'The enquiry has been deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function getEnquiries(Request $request, Enquiry $enquiry)
    {
        $enquiry = Enquiry::latest('id')->get();
        return response()->json(['data' => $enquiry]);
    }
}
