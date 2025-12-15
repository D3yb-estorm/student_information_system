<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $primaryKey = 'log_id';
    protected $table = 'audit_logs';
    public $timestamps = false;
    protected $fillable = [
        'staff_id',
        'action',
        'entity',
        'entity_id',
        'details',
        'timestamp'
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];
}
