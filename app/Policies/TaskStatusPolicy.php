<?php

namespace App\Policies;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TaskStatus $taskStatus)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TaskStatus $taskStatus)
    {
        $exists = Task::where('status_id', $taskStatus->id)->exists();
        return !$exists && Auth::check();
    }

}
