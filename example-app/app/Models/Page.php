<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'seo_title',
        'seo_description',
        
    ];
}
