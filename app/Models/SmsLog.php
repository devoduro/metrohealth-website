<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'patient_id',
        'phone',
        'message',
        'type',
        'status',
        'response',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
