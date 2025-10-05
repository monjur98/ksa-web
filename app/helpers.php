<?php
use App\Models\ProjectGalleryType;

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function projectTypes()
{
    return ProjectGalleryType::select('id', 'type')->where('status', 1)->get();
}
