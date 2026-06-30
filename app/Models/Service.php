<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'is_active',
        'price_min',
        'price_max',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function getPriceRange()
    {
        if ($this->price_min && $this->price_max) {
            if ($this->price_min == $this->price_max) {
                return 'GH¢ ' . number_format($this->price_min, 2);
            }
            return 'GH¢ ' . number_format($this->price_min, 2) . ' - GH¢ ' . number_format($this->price_max, 2);
        } elseif ($this->price_min) {
            return 'From GH¢ ' . number_format($this->price_min, 2);
        } elseif ($this->price_max) {
            return 'Up to GH¢ ' . number_format($this->price_max, 2);
        }
        return 'Price not set';
    }
}
