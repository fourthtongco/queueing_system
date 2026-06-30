<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QueueLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_ticket_id',
        'counter_id',
        'user_id',
        'action',
        'remarks',
    ];

    public function queueTicket(): BelongsTo
    {
        return $this->belongsTo(QueueTicket::class);
    }

    public function counter(): BelongsTo
    {
        return $this->belongsTo(Counter::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
