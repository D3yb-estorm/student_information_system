<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = [
        'department_name'
    ];

    /**
     * Get all instructors in this department.
     */
    public function instructors(): HasMany
    {
        return $this->hasMany(Instructor::class, 'department_id', 'department_id');
    }

    /**
     * Get all courses offered by this department.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'department_id', 'department_id');
    }
}
