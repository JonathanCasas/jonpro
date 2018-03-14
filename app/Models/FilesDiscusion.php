<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FilesDiscusion
 * 
 * @property int $id
 * @property string $route
 * @property string $name
 * @property string $type
 * @property int $discusions_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Discusion $discusion
 *
 * @package App\Models
 */
class FilesDiscusion extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'discusions_id' => 'int'
    ];
    protected $fillable = [
        'route',
        'name',
        'type',
        'discusions_id'
    ];

    public function discusion() {
        return $this->belongsTo(\App\Models\Discusion::class, 'discusions_id');
    }

}
