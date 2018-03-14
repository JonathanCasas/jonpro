<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:54:51 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Project
 * 
 * @property int $id
 * @property string $name
 * @property string $state
 * @property string $priority
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property string $description
 * @property int $company_id
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Company $company
 * @property \Illuminate\Database\Eloquent\Collection $discusions
 * @property \Illuminate\Database\Eloquent\Collection $files_projects
 * @property \Illuminate\Database\Eloquent\Collection $tasks
 * @property \Illuminate\Database\Eloquent\Collection $teams
 * @property \Illuminate\Database\Eloquent\Collection $tickets
 * @property \App\User $creator
 *
 * @package App\Models
 */
class Project extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'company_id' => 'int',
        'created_by' => 'int'
    ];
    protected $dates = [
        'start_date',
        'end_date'
    ];
    protected $fillable = [
        'name',
        'state',
        'priority',
        'start_date',
        'description',
        'company_id',
        'created_by',
        'end_date'
    ];

    public function company() {
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function discusions() {
        return $this->hasMany(\App\Models\Discusion::class, 'projects_id');
    }

    public function files_projects() {
        return $this->hasMany(\App\Models\FilesProject::class, 'projects_id');
    }

    public function tasks() {
        return $this->hasMany(\App\Models\Task::class, 'projects_id');
    }

    public function teams() {
        return $this->hasMany(\App\Models\Team::class, 'projects_id');
    }

    public function tickets() {
        return $this->hasMany(\App\Models\Ticket::class, 'projects_id');
    }

    public function creator() {
        return $this->belongsTo(\App\User::class, 'created_by', 'id');
    }

}
