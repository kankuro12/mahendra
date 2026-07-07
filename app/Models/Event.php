<?php

namespace App\Models;

use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<EventFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'type', 'starts_at', 'event_date'];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }
}
