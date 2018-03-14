<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Discusion
 * 
 * @property int $id
 * @property string $title
 * @property string $comment
 * @property int $projects_id
 * @property int $users_id
 * @property string $type
 * @property int $parent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $files_discusions
 *
 * @package App\Models
 */
class Discusion extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'projects_id' => 'int',
        'users_id' => 'int',
        'parent' => 'int'
    ];
    protected $fillable = [
        'title',
        'comment',
        'projects_id',
        'users_id',
        'type',
        'parent'
    ];

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function user() {
        return $this->belongsTo(\App\User::class, 'users_id');
    }

    public function files_discusions() {
        return $this->hasMany(\App\Models\FilesDiscusion::class, 'discusions_id');
    }

}
