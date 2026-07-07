<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    public function clinicServices()
    {
        return $this->hasMany(ClinicService::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }
}
