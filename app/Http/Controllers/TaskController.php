<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    use \Joncasas\Operations\Tasks\ValidateTaskController,
        \Joncasas\Operations\Tasks\TasksOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Project $project
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Models\Project $project, Request $request) {
        $v = $this->validateStore($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $this->storeTaskProject($project, $request);
            flash()->success('correctly created task');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $v = $this->validateStore($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $task = Task::find($request->get('id'));
            $this->updateTaskProject($task, $request);
            flash()->success('correctly updated task');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        //
    }

    /**
     * Get task with ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAjaxTask(Request $request) {
        if ($request->ajax()) {
            $task = Task::find($request->get('id'));
            if (!is_null($task->start_date)) {
                $task->start_date = $task->start_date->format('Y-m-d');
            }
            if (!is_null($task->end_date)) {
                $task->end_date = $task->end_date->format('Y-m-d');
            }
            $task->assigned;
            return response()->json($task);
        }
    }

}
