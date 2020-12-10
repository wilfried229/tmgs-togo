<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comptage extends Model
{
    //

    protected $table = "comptage";

    protected $fillable =['date','voie_id','site_id','vacation','nbre_passageManuel',
        'nbre_passageSysteme','montantManuel','montantInformatiser',
        'observation','user_id'
    ];
}
