<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $name
 * @property string $nit
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $projects
 *
 * @package App\Models
 */
class Company extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'company';
    protected $fillable = [
        'name',
        'nit'
    ];

    public function projects() {
        return $this->hasMany(\App\Models\Project::class);
    }

}
