<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'preacher',
        'scripture_reference',
        'sermon_date',
        'description',
        'audio_url',
        'video_url',
        'transcript',
        'series',
        'tags',
        'featured',
        'published',
    ];

    protected $casts = [
        'sermon_date' => 'date',
        'featured' => 'boolean',
        'published' => 'boolean',
        'tags' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeBySeries($query, $series)
    {
        return $query->where('series', $series);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
