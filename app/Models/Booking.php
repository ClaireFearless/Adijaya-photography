<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'package_id',
        'customer_name',
        'customer_email',
        'customer_wa',
        'booking_date',
        'start_time',
        'end_time',
        'location',
        'notes',
        'total_price',
        'dp_amount',
        'payment_type',
        'status',
        'snap_token',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'total_price' => 'decimal:2',
        'dp_amount' => 'decimal:2',
    ];

    // Relasi ke package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    // Relasi ke payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Relasi ke review
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}