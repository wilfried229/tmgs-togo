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
}
