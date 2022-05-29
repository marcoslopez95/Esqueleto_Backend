<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{

    protected $hidden  = ["updated_at","created_at"];

    protected static function boot()
    {
        parent::boot();
    }


}
