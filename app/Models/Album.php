<?php

namespace App\Models;

use Database\Factories\AlbumFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /** @use HasFactory<AlbumFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'date', 'youtube', 'images'];

    protected function casts(): array
    {
        return [
            'images' => 'array',
        ];
    }
}
