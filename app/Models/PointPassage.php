<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointPassage extends Model
{

 //
    protected $table = "point_passages";

    protected $fillable =['date','voie_id','site_id','vacation','type_passage',
        'somme_total_trafic','somme_total_recette_equialente','paiement_espece_defaut_provision',
        'observations','user_id'
    ];
}
