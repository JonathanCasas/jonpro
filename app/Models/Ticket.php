<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:56:03 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property int $projects_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $files_tickets
 *
 * @package App\Models
 */
class Ticket extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'projects_id' => 'int'
    ];
    protected $fillable = [
        'projects_id'
    ];

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'projects_id');
    }

    public function files_tickets() {
        return $this->hasMany(\App\Models\FilesTicket::class, 'tickets_id');
    }

}
