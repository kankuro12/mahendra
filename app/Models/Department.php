<?php

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    /** @use HasFactory<DepartmentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon', 'sort_order'];

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class)->orderBy('sort_order');
    }
}
