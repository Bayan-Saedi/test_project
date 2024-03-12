<?php

namespace App\Console\Commands;

use App\Repositories\TaskRepository;
use Illuminate\Console\Command;

class completeExpiredTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:complete-expired-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TaskRepository $repository): void
    {
        try {
            $repository->updateTasksStatus();
        } catch (\Throwable $exception) {
            // TODO: handle any type of exception
        }
    }
}
