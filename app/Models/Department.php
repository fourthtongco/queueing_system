<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'code',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function counters(): HasMany
    {
        return $this->hasMany(Counter::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function queueTickets(): HasMany
    {
        return $this->hasMany(QueueTicket::class);
    }
}
