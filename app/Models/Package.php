<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'price',
        'dp_amount',
        'duration',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'dp_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relasi ke bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}