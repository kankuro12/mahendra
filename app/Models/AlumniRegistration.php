<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniRegistration extends Model
{
    protected $fillable = ['name', 'email', 'graduation_year', 'occupation', 'location', 'message', 'read'];

    protected function casts(): array
    {
        return [
            'graduation_year' => 'integer',
            'read' => 'boolean',
        ];
    }
}
