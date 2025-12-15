<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassSection extends Model
{
    protected $primaryKey = 'section_id';
    protected $table = 'class_sections';
    protected $fillable = [
        'course_id',
        'instructor_id',
        'section_code',
        'schedule',
        'room',
        'capacity',
        'semester',
        'academic_year'
    ];

    /**
     * Get the course for this section.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    /**
     * Get the instructor for this section.
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'instructor_id');
    }

    /**
     * Get all enrollments in this section.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'section_id', 'section_id');
    }
}
