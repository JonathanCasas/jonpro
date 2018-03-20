<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                ->whereIn('state', ['Open', 'Waiting', 'New'])
                ->orderBy('start_date', 'asc')
                ->paginate(10, ['*'], 'all');
        $dayTasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                ->whereIn('state', ['Open', 'Waiting', 'New'])
                ->where('start_date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))
                ->orWhereNull('start_date')
                ->whereIn('state', ['Open', 'Waiting', 'New'])
                ->where('assigned_to', '=', auth()->user()->id)
                ->paginate(10, ['*'], 'day');
        $states = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'state');
        $priorities = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'priority');
        $types = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'type');
        return view('home')
                        ->with('tasks', $tasks)
                        ->with('dayTasks', $dayTasks)
                        ->with('states', $states)
                        ->with('priorities', $priorities)
                        ->with('types', $types);
    }

}
