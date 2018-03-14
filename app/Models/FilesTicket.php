<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 01:53:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class FilesTicket
 * 
 * @property int $id
 * @property string $route
 * @property string $name
 * @property string $type
 * @property int $tickets_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Ticket $ticket
 *
 * @package App\Models
 */
class FilesTicket extends Eloquent {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'tickets_id' => 'int'
    ];
    protected $fillable = [
        'route',
        'name',
        'type',
        'tickets_id'
    ];

    public function ticket() {
        return $this->belongsTo(\App\Models\Ticket::class, 'tickets_id');
    }

}
