<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'user_id',
        'field_id',
        'booking_date',
        'total_price',
        'dp_amount',
        'remaining_amount',
        'payment_method',
        'status',
        'notes'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'total_price' => 'decimal:2',
        'dp_amount' => 'decimal:2',
        'remaining_amount' => 'decimal:2'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->booking_code = 'BK' . date('Ymd') . str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);
            $booking->dp_amount = $booking->total_price * 0.2; // 20% DP
            $booking->remaining_amount = $booking->total_price - $booking->dp_amount;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    // Relasi many-to-many ke FieldSchedule
    public function fieldSchedules()
    {
        return $this->belongsToMany(
            FieldSchedule::class,
            'booking_field_schedule',  // nama pivot table
            'booking_id',              // foreign key untuk booking
            'field_schedule_id'        // foreign key untuk field_schedule
        )->withTimestamps();
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
