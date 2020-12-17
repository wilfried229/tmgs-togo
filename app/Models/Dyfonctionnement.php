<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Dyfonctionnement extends Model
{
    //
    protected $table= "dyfonctionnement";

    protected $fillable =['site_id','date','localisation',
        'dysfonctionnement','cause',
        'travauxArealiser','travauxRealiser',
        'heureConstat',
        'heureDebutIntervention',
        'heureFinIntervention',
        'resultatObtenir',
        'besoins',
        'preuve_avant',
        'preuve_apres',
        'observation'];
        public function site(){

            return $this->belongsTo(Site::class,'site_id','id');
        }



        public function user(){

            return $this->belongsTo(User::class,'user_id','id');
        }
}
