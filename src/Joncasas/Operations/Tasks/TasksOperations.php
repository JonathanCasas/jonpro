<?php

namespace Joncasas\Operations\Tasks;

/**
 *
 * @author jonathan
 */
trait TasksOperations {

    /**
     * @param \App\Models\Project $project
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function storeTaskProject(\App\Models\Project $project, \Illuminate\Http\Request $request) {
        $task = new \App\Models\Task($request->all());
        $task->projects_id = $project->id;
        try {
            $task->save();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

}
