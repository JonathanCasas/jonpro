<?php

namespace Joncasas\Operations\Home;

/**
 *
 * @author jonathan
 */
trait HomeOperations {

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearch(\Illuminate\Http\Request $request) {
        return \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                        ->whereIn('state', ['New', 'Waiting', 'Open'])
                        ->where(function($query) {
                            return $query->where('start_date', "<=", \Carbon\Carbon::now()->format('Y-m-d'))
                                    ->orWhereNull('start_date');
                        })
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
                            if ($request->has('project') && !is_null($request->get('project'))) {
                                $query->where('projects_id', '=', $request->get('project'));
                            }
                            return $query;
                        })->paginate(10);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearchTwo(\Illuminate\Http\Request $request) {
        return \App\Models\Task::where('assigned_to', '=', auth()->user()->id)
                        ->whereIn('state', ['New', 'Waiting', 'Open'])
                        ->where(function($query) {
                            return $query->where('start_date', "<=", \Carbon\Carbon::now()->format('Y-m-d'))
                                    ->orWhereNull('start_date');
                        })
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
                            if ($request->has('project') && !is_null($request->get('project'))) {
                                $query->where('projects_id', '=', $request->get('project'));
                            }
                            if ($request->has('state') && !is_null($request->get('state'))) {
                                $query->where('state', 'like', "%{$request->get('state')}%");
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
