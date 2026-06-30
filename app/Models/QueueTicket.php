<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QueueTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'department_id',
        'service_id',
        'student_number',
        'student_name',
        'priority',
        'status',
        'queue_date',
    ];

    protected $casts = [
        'priority' => 'boolean',
        'queue_date' => 'date',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function queueLogs(): HasMany
    {
        return $this->hasMany(QueueLog::class);
    }
}
