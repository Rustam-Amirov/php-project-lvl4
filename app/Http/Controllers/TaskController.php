<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\Label;
use Exception;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index')->with('tasks', Task::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->authorize('create', Task::class);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('tasks.index'));
        }
        return view('tasks.create', [
            'task_statuses' => TaskStatus::all(),
            'users' => User::all(),
            'labels' => Label::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('create', Task::class);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('tasks.index'));
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'status_id' => ['required', 'integer', 'min:1', 'exists:task_statuses,id'],
            'description' => ['max:255'],
            'labels.*' => ['integer', 'exists:labels,id'],
            'assigned_to_id' => ['integer', 'exists:users,id']
        ]);

        try {
            DB::beginTransaction();
            $task = Task::create([
                'name' => $request->name,
                'status_id' => $request->status_id,
                'description' => $request->description,
                'assigned_to_id'  => $request->assigned_to_id,
                'created_by_id'  => Auth::id(),
            ]);
            if (!empty($request->labels) > 0) {
                foreach ($request->labels as $label) {
                    $label = Label::findOrFail($label);
                    $task->labels()->save($label);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        flash(__('task.create'))->success();
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        try {
            $this->authorize('update', $task);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('tasks.index'));
        }

        return view('tasks.edit', [
            'task' => $task,
            'task_statuses' => TaskStatus::all(),
            'users' => User::all(),
            'labels' => Label::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        try {
            $this->authorize('update', $task);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('tasks.index'));
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:1'],
            'status_id' => ['required', 'integer', 'min:1', 'exists:task_statuses,id'],
            'description' => ['max:255'],
            'labels' => [],
            'assigned_to_id' => ['integer', 'exists:users,id']
        ]);

        try {
            DB::beginTransaction();
            $task->name = $request->name;
            $task->status_id = $request->status_id;
            $task->description = $request->description;
            $task->update();
            $task->labels()->sync($request->labels);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        flash(__('task.update'))->success();
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            $this->authorize('delete', $task);
        } catch (AuthorizationException $e) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('tasks.index'));
        }

        $task->delete();
        flash(__('task.delete'))->success();
        return redirect(route('tasks.index'));
    }
}
