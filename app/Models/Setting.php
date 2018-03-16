<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 21:39:30 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $site_name
 * @property string $site_title
 * @property string $lang
 * @property string $image_background
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Setting extends Eloquent {

    protected $fillable = [
        'site_name',
        'site_title',
        'lang',
        'image_background'
    ];

}
