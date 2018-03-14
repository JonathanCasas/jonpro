<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:55:05 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Task
 * 
 * @property int $id
 * @property int $projects_id
 * @property string $name
 * @property string $type
 * @property string $comments
 * @property string $state
 * @property string $priority
 * @property int $assigned_to
 * @property int $estimated_time
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $files_tasks
 *
 * @package App\Models
 */
class Task extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'projects_id' => 'int',
        'assigned_to' => 'int',
        'estimated_time' => 'int'
    ];
    protected $dates = [
        'start_date',
        'end_date'
    ];
    protected $fillable = [
        'projects_id',
        'name',
        'type',
        'comments',
        'state',
        'priority',
        'assigned_to',
        'estimated_time',
        'start_date',
        'end_date'
    ];

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function files_tasks() {
        return $this->hasMany(\App\Models\FilesTask::class, 'tasks_id');
    }

}
