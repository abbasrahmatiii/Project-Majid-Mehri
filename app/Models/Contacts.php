<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_email',
        'mobile_number',
        'phone_number',
        'working_hours',
        'working_days',
        'copyright_text',
        'logo',
        'facebook_url',
        'facebook_icon',
        'telegram_url',
        'telegram_icon',
        'whatsapp_url',
        'whatsapp_icon',
        'linkedin_url',
        'linkedin_icon',
    ];
}
