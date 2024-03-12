<?php

namespace App\Repositories;

use App\Enums\TaskStatusEnum;
use App\Models\Task;

class TaskRepository
{

    /**
     * Constructor
     * @param Task $model
     */
    public function __construct(protected Task $model)
    {
    }

    /**
     * @return mixed
     */
    public function updateTasksStatus(): mixed
    {
        return $this->model
            ->expired()
            ->update([
                'status' => TaskStatusEnum::COMPLETED,
                'title' => 'dddd'
            ]);
    }
}
