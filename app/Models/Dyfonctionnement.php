<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dyfonctionnement extends Model
{
    //
    protected $table= "dyfonctionnement";

    protected $fillable =['voie_id','site_id','date','localisation',
        'dysfonctionnement','cause',
        'travauxArealiser','travauxRealiser',
        'heureConstat',
        'heureDebutIntervention',
        'heureFinIntervention',
        'resultatObtenir',
        'besoins',
        'preuve',
        'observation'];
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
