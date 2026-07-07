<?php

namespace App\Models;

use Database\Factories\LeadershipMessageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadershipMessage extends Model
{
    /** @use HasFactory<LeadershipMessageFactory> */
    use HasFactory;

    protected $fillable = ['slug', 'title', 'author', 'role', 'image', 'teaser', 'paragraphs', 'date'];

    protected function casts(): array
    {
        return [
            'paragraphs' => 'array',
        ];
    }
}
