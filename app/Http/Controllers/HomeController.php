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
        $projects = \App\Models\Project::all();
        $tasks = \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                ->whereIn('state', ['Open', 'Waiting', 'New'])
                ->orderBy('start_date', 'asc')
                ->paginate(10);
        return view('home')->with('tasks', $tasks);
    }

}
