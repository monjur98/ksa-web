<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('website.contact', compact('contact'));
    }
}
