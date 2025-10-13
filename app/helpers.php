<?php
use App\Models\ProjectGalleryType;
use App\Models\Enquiry;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function projectTypes()
{
    return ProjectGalleryType::select('id', 'type')->where('status', 1)->get();
}

function enquiryQTY()
{
    return Enquiry::where('status', 0)->count();
}

function contactInfo()
{
    return Contact::select('phone', 'email', 'address')->first();
}

