<?php

namespace App\Http\Controllers\Api;

use App\Events\TaskStatusUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskStatusRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function store(TaskRequest $request, TaskRepository $repository)
    {
        $task = $request->user()->tasks()->create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully.',
            'data' => $task,
        ], Response::HTTP_CREATED);

    }

    public function update(TaskStatusRequest $request, Task $task)
    {
        $task->update($request->validated());
        TaskStatusUpdated::dispatch($task);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
        ]);
    }
}
