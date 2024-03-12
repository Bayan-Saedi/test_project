<?php

use App\Models\Task;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('tasks.{taskId}', function ($user, $taskId) {
//    return $user->id === Task::find($taskId)->user_id;
//    All authorized users can listen to this channel
    return true;
});
