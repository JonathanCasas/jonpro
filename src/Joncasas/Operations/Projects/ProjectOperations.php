<?php

namespace Joncasas\Operations\Projects;

/**
 *
 * @author jonathan
 */
trait ProjectOperations {

    /**
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function storeProject(\Illuminate\Http\Request $request) {
        $project = new \App\Models\Project($request->all());
        try {
            $project->created_by = auth()->user()->id;
            $project->save();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \App\Models\Project $project
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function updateProject(\App\Models\Project $project, \Illuminate\Http\Request $request) {
        try {
            $project->update($request->all());
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearch(\Illuminate\Http\Request $request) {
        $query = \App\Models\Project::select();
        if ($request->has('id') && !is_null($request->get('id'))) {
            $query->where('id', 'like', "%{$request->get('id')}%");
        }
        if ($request->has('name') && !is_null($request->get('name'))) {
            $query->where('name', 'like', "%{$request->get('name')}%");
        }
        if ($request->has('state') && !is_null($request->get('state'))) {
            $query->where('state', 'like', "%{$request->get('state')}%");
        }
        if ($request->has('priority') && !is_null($request->get('priority'))) {
            $query->where('priority', 'like', "%{$request->get('priority')}%");
        }
        if ($request->has('start_date') && !is_null($request->get('start_date'))) {
            $query->where('start_date', 'like', "%{$request->get('start_date')}%");
        }
        if ($request->has('created_by') && !is_null($request->get('created_by'))) {
            $query->where('created_by', '=', $request->get('created_by'));
        }
        if ($request->has('company_id') && !is_null($request->get('company_id'))) {
            $query->where('company_id', '=', $request->get('company_id'));
        }
        return $query->paginate(10);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearchTasks(\Illuminate\Http\Request $request, \App\Models\Project $project) {
        return \App\Models\Task::where('projects_id', '=', $project->id)
                        ->where(function($query)use($request) {
                            if ($request->has('id') && !is_null($request->get('id'))) {
                                $query->where('id', 'like', "%{$request->get('id')}%");
                            }
                            if ($request->has('name') && !is_null($request->get('name'))) {
                                $query->where('name', 'like', "%{$request->get('name')}%");
                            }
                            if ($request->has('type') && !is_null($request->get('type'))) {
                                $query->where('type', 'like', "%{$request->get('type')}%");
                            }
                            if ($request->has('priority') && !is_null($request->get('priority'))) {
                                $query->where('priority', 'like', "%{$request->get('priority')}%");
                            }
                            if ($request->has('state') && !is_null($request->get('state'))) {
                                $query->where('state', 'like', "%{$request->get('state')}%");
                            }
                            if ($request->has('assigned_to') && !is_null($request->get('assigned_to'))) {
                                $query->where('assigned_to', '=', $request->get('assigned_to'));
                            }
                            if ($request->has('estimated_time') && !is_null($request->get('estimated_time'))) {
                                $query->where('estimated_time', 'like', "%{$request->get('state')}%");
                            }
                            if ($request->has('start_date') && !is_null($request->get('start_date'))) {
                                $query->where('start_date', 'like', "%{$request->get('start_date')}%");
                            }
                            if ($request->has('end_date') && !is_null($request->get('end_date'))) {
                                $query->where('end_date', 'like', "%{$request->get('end_date')}%");
                            }
                            return $query;
                        })->paginate(10);
    }

}
