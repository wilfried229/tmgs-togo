<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voie extends Model
{



    protected $table = "voie";

    protected $fillable =['libelle','site_id'];


    public function site(){


    return $this->belongsTo(Site::class,'site_id','id');

    }
}
