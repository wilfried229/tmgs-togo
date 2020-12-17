<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comptage extends Model
{
    //

    protected $table = "comptage_contraditoire";

    protected $fillable =['date','voie_id','site_id','vacation','nbre_passageManuel',
        'nbre_passageSysteme','montantManuel','montantInformatiser',
        'observation','user_id'
    ];

    public function site(){

        return $this->belongsTo(Site::class,'site_id','id');
    }

    public function voie(){

        return $this->belongsTo(Voie::class,'voie_id','id');
    }


    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
