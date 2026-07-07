<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'is_active',
        'has_multiple_doctors',
        'service_category_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'has_multiple_doctors' => 'boolean',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
