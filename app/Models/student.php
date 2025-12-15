<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'contact_number',
        'address',
        'enrollment_status'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Get all enrollments for this student.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'student_id', 'student_id');
    }

    /**
     * Get all transcripts for this student.
     */
    public function transcripts(): HasMany
    {
        return $this->hasMany(Transcript::class, 'student_id', 'student_id');
    }

    /**
     * Get the full name of the student.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
