<?php

namespace App\Models;

use Database\Factories\NoticeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /** @use HasFactory<NoticeFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'is_urgent', 'attachment_path', 'published_at'];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_urgent' => 'boolean',
        ];
    }
}
