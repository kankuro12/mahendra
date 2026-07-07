<?php

namespace App\Models;

use Database\Factories\FacilityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    /** @use HasFactory<FacilityFactory> */
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'tagline', 'icon', 'image', 'summary',
        'description', 'features', 'coordinator', 'coordinator_role', 'specifications',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'specifications' => 'array',
        ];
    }
}
