<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    //
    //
    //
    /**
     * Get the user of the society .
     */
    public function user()
    {
        return $this->belongsTo('App\User','id_proprietaire','id');
    }
}
