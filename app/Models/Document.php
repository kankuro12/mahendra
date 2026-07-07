<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'type', 'title', 'description', 'reference',
        'deadline', 'file_path', 'published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'published' => 'boolean',
        ];
    }

    public function scopeDownloads($query)
    {
        return $query->where('type', 'download');
    }

    public function scopeTenders($query)
    {
        return $query->where('type', 'tender');
    }

    public function scopeCareers($query)
    {
        return $query->where('type', 'career');
    }
}
