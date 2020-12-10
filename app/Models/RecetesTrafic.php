<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecetesTrafic extends Model
{
    //

    protected $table = "recettes_trafics";

    protected $fillable =['date','voie_id','site_id','vacation','agent_voie',
        'montant','recette_informatiser','recette_declarer',
        'manquant','supplus','vl','mini_bus','autocars_camion','pl',
        'nbre_exempte','violation','total','observation','user_id'
        ];
}
