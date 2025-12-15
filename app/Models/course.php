<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $primaryKey = 'course_id';
    protected $table = 'academic_courses';
    protected $fillable = [
        'program_id',
        'department_id',
        'course_code',
        'course_name',
        'units'
    ];

    /**
     * Get the program this course belongs to.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    /**
     * Get the department this course belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * Get all class sections for this course.
     */
    public function classSections(): HasMany
    {
        return $this->hasMany(ClassSection::class, 'course_id', 'course_id');
    }
}
