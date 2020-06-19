<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    //
     //
     /**
     * Get the society for the selected user.
     */
    public function propriete()
    {
        return $this->hasOne('App\Propriete','id_telephone','id');
    }
}
