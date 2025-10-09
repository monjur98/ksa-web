<?php
use App\Models\ProjectGalleryType;
use App\Models\Enquiry;

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
