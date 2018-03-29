<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {

    use \Joncasas\Operations\Projects\ValidateProjectController,
        \Joncasas\Operations\Projects\ProjectOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $projects = Project::paginate(10);
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $states = \Joncasas\Operations\DatabaseHelpers::getEnumValues('projects', 'state');
        $priorities = \Joncasas\Operations\DatabaseHelpers::getEnumValues('projects', 'priority');
        return view('projects.create')
                        ->with('states', $states)
                        ->with('priorities', $priorities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response$column
     */
    public function store(Request $request) {
        $v = $this->validateStore($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $this->storeProject($request);
            flash()->success('Correctly created project');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) {
        $tasks = $project->tasks()->orderBy('created_at', 'desc')->paginate(10);
        $states = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'state');
        $priorities = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'priority');
        $types = \Joncasas\Operations\DatabaseHelpers::getEnumValues('tasks', 'type');
        return view('projects.tasks')
                        ->with('project', $project)
                        ->with('tasks', $tasks)
                        ->with('states', $states)
                        ->with('priorities', $priorities)
                        ->with('types', $types);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project) {
        $states = \Joncasas\Operations\DatabaseHelpers::getEnumValues('projects', 'state');
        $priorities = \Joncasas\Operations\DatabaseHelpers::getEnumValues('projects', 'priority');
        return view('projects.update')
                        ->with('states', $states)
                        ->with('priorities', $priorities)
                        ->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project) {
        $v = $this->validateStore($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $this->updateProject($project, $request);
            flash()->success('Correctly updated project');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project) {
        //
    }

    /**
     * Search projects for select2
     */
    public function select2(Request $request) {
        $projects = Project::where('name', 'like', "%{$request->get('term')}%")->paginate(10);
        $dataJson = array();
        foreach ($projects as $project) {
            $dataJson['results'][] = [
                'id' => $project->id,
                'text' => $project->name
            ];
        }
        $dataJson['pagination'] = ['more' => $projects->hasMorePages()];
        return response()->json($dataJson);
    }

}
