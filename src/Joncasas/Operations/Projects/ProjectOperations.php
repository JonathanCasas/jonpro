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

}
