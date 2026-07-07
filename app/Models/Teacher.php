<?php

namespace App\Models;

use Database\Factories\TeacherFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    /** @use HasFactory<TeacherFactory> */
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'title', 'credentials', 'image', 'sort_order'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
