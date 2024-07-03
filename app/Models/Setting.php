<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'meta_description',
        'meta_keywords',
        'contact_email',
        'address',
        'additional_header_tags',
        'additional_footer_tags',
        'seo_site_name',
        'default_keyword',
        'meta_robots',
        'google_analytics'
    ];
}
