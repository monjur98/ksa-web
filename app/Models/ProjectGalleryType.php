<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGalleryType extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'status'];
}
