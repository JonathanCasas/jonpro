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
    
    /**
     * @param \App\Models\Task $task
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function updateTaskProject(\App\Models\Task $task, \Illuminate\Http\Request $request) {
        try {
            $task->update($request->all());
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
    
}
