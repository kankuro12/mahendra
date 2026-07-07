<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'name', 'graduation_year', 'occupation', 'location', 'email',
        'image', 'story', 'facebook', 'linkedin',
        'is_featured', 'published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'graduation_year' => 'integer',
            'is_featured' => 'boolean',
            'published' => 'boolean',
        ];
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeSearch($query, ?string $term)
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
                ->orWhere('occupation', 'like', "%{$term}%")
                ->orWhere('location', 'like', "%{$term}%")
                ->orWhere('graduation_year', 'like', "%{$term}%");
        });
    }
}
