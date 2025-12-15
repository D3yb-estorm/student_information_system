<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transcript extends Model
{
    protected $primaryKey = 'transcript_id';
    protected $fillable = [
        'student_id',
        'date_generated',
        'generated_by_staff_id',
        'file_path'
    ];

    protected $casts = [
        'date_generated' => 'date',
    ];

    /**
     * Get the student for this transcript.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
