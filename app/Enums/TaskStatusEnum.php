<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case OPEN = 'open';
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public static function values(): array
    {
        return array_column(TaskStatusEnum::cases(), 'value');
    }

}
