<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task_statuses.index')->with('taskStatuses', TaskStatus::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('task_statuses.index'));
        }
        return view('task_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('task_statuses.index'));
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:1'],
        ]);

        TaskStatus::create(['name' => $request->name]);

        flash(__('taskStatus.create'))->success();
        return redirect(route('task_statuses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        if (!Auth::check()) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('task_statuses.index'));
        }
        return view('task_statuses.edit', ['taskStatus' => $taskStatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        if (!Auth::check()) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('task_statuses.index'));
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:1'],
        ]);
        $taskStatus->name = $request->name;
        $taskStatus->update();

        flash(__('taskStatus.update'))->success();

        return redirect(route('task_statuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if (!Auth::check()) {
            flash(__('auth.auth_check'))->error();
            return redirect(route('task_statuses.index'));
        }
        $taskStatus->delete();
        flash(__('taskStatus.delete'))->success();
        return redirect(route('task_statuses.index'));
    }
}
