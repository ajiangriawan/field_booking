<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FieldSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'day_of_week',
        'start_time',
        'end_time',
        'price',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function isBooked($date): bool
    {
        return $this->bookings()
            ->where('booking_date', $date)
            ->whereIn('status', ['dp_paid', 'fully_paid'])
            ->exists();
    }
}