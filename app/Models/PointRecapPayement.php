<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointRecapPayement extends Model
{
    //
    public function passageGate(){

        return  PointPassage::all();

    }
}
