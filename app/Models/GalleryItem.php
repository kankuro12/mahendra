<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'photopath', 'youtube_link', 'type', 'sort_order'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function thumbnail(): ?string
    {
        if ($this->type === 'image' && $this->photopath) {
            return asset('storage/'.$this->photopath);
        }

        if ($this->type === 'youtube' && $this->youtube_link) {
            $id = $this->youtubeId();

            return $id ? 'https://img.youtube.com/vi/'.$id.'/mqdefault.jpg' : null;
        }

        return null;
    }

    public function youtubeId(): ?string
    {
        if (! $this->youtube_link) {
            return null;
        }

        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->youtube_link, $m);

        return $m[1] ?? null;
    }
}
