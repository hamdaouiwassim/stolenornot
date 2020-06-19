<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    //
      //
    //
    /**
     * Get the user of the society .
     */
    public function telephone()
    {
        return $this->belongsTo('App\Telephone','id_telephone','id');
    }
}
