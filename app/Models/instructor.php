<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    protected $primaryKey = 'instructor_id';
    protected $fillable = [
        'department_id',
        'first_name',
        'last_name',
        'email',
        'role'
    ];

    /**
     * Get the department this instructor belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * Get all class sections taught by this instructor.
     */
    public function classSections(): HasMany
    {
        return $this->hasMany(ClassSection::class, 'instructor_id', 'instructor_id');
    }

    /**
     * Get the full name of the instructor.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
