<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FilesTask
 * 
 * @property int $id
 * @property string $route
 * @property string $name
 * @property string $type
 * @property int $tasks_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Task $task
 *
 * @package App\Models
 */
class FilesTask extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'tasks_id' => 'int'
    ];
    protected $fillable = [
        'route',
        'name',
        'type',
        'tasks_id'
    ];

    public function task() {
        return $this->belongsTo(\App\Models\Task::class, 'tasks_id');
    }

}
