<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:55:16 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Team
 * 
 * @property int $id
 * @property int $projects_id
 * @property int $users_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Team extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'team';
    protected $casts = [
        'projects_id' => 'int',
        'users_id' => 'int'
    ];
    protected $fillable = [
        'projects_id',
        'users_id'
    ];

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function user() {
        return $this->belongsTo(\App\User::class, 'users_id');
    }

}
