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
                                $query->where('type', 'like', "%{$request->get('name')}%");
                            }
                            if ($request->has('priority') && !is_null($request->get('priority'))) {
                                $query->where('priority', 'like', "%{$request->get('priority')}%");
                            }
                            if ($request->has('proyect') && !is_null($request->get('priority'))) {
                                $query->where('projects_id', '=', $request->get('proyect'));
                            }
                            return $query;
                        })->paginate(10);
    }

}
