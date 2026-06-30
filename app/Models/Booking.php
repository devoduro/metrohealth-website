<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'customer_category',
        'service_location',
        'street_address',
        'postcode',
        'name',
        'email',
        'phone',
        'hair_type',
        'preferred_date',
        'preferred_time',
        'message',
        'status',
        'estimated_price',
        'deposit_amount',
        'payment_status',
        'stripe_payment_intent_id',
        'stripe_session_id',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
