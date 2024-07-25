<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'day_id', 'time_slot_id', 'consultant_id', 'date', 'price',
    ];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    // public function day()
    // {
    //     return $this->belongsTo(Day::class);
    // }
    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
