<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $primaryKey = 'enrollment_id';
    protected $fillable = [
        'student_id',
        'section_id',
        'date_enrolled',
        'status',
        'grade',
        'grade_remarks'
    ];

    protected $casts = [
        'date_enrolled' => 'date',
    ];

    /**
     * Get the student for this enrollment.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    /**
     * Get the class section for this enrollment.
     */
    public function classSection(): BelongsTo
    {
        return $this->belongsTo(ClassSection::class, 'section_id', 'section_id');
    }
}
