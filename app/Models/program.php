<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $primaryKey = 'program_id';
    protected $fillable = [
        'program_name',
        'degree_level'
    ];

    /**
     * Get all courses in this program.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'program_id', 'program_id');
    }
}
