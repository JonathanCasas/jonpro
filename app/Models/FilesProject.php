<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FilesProject
 * 
 * @property int $id
 * @property string $route
 * @property string $name
 * @property string $type
 * @property int $projects_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 *
 * @package App\Models
 */
class FilesProject extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'projects_id' => 'int'
    ];
    protected $fillable = [
        'route',
        'name',
        'type',
        'projects_id'
    ];

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

}
