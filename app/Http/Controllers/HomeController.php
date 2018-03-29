<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    use \Joncasas\Operations\Home\HomeOperations;

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
    public function index(Request $request) {
        $tasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                        ->whereIn('state', ['Open', 'Waiting', 'New'])
                        ->orderBy('start_date', 'asc')->get()->take(5);
        $dayTasks = null;
        if ($request->has('filter')) {
            $dayTasks = $this->getQuerySearch($request);
        } else {
            $dayTasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                    ->whereIn('state', ['Open', 'Waiting', 'New'])
                    ->where('start_date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))
                    ->orWhereNull('start_date')
                    ->whereIn('state', ['Open', 'Waiting', 'New'])
                    ->where('assigned_to', '=', auth()->user()->id)
                    ->paginate(10, ['*'], 'day');
        }

        $states = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'state');
        $priorities = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'priority');
        $types = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'type');
        return view('home')
                        ->with('request', $request)
                        ->with('tasks', $tasks)
                        ->with('dayTasks', $dayTasks)
                        ->with('states', $states)
                        ->with('priorities', $priorities)
                        ->with('types', $types);
    }

    public function allTasks() {
        $tasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                ->whereIn('state', ['Open', 'Waiting', 'New'])
                ->orderBy('start_date', 'asc')
                ->paginate(10, ['*'], 'all');
        return view('tasks')->with('tasks', $tasks);
    }

}
