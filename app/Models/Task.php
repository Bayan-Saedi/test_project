<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static expired()
 */
class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeExpired($query)
    {
        return $query
            ->whereDate('created_at' , '<=', Carbon::today()->subDays( 2 ))
            ->where('status', '<>', TaskStatusEnum::COMPLETED);
    }
}
