<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingFieldSchedule extends Model
{
    protected $table = 'booking_field_schedule';

    protected $fillable = [
        'booking_id',
        'field_schedule_id',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function fieldSchedule()
    {
        return $this->belongsTo(FieldSchedule::class);
    }
}
