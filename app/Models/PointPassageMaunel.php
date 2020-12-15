<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointPassageMaunel extends Model
{
   



    protected $table = "point_passage_manuelle";

    protected $fillable =['date','voie_id','site_id','vacation','type_passage','identite_percepteur',
        'point_traf_info_mode_manuel','solde_recette_info_mode_manuel','heure_debutComptage','heure_finComptage',
        'trafic_compteManu','equipRecette','etaDonne_taficInformatiser','etaDonne_recetteInformatiser','etaFinal_recetteInformatiser',
        'etaFinal_recetteInformatiser','observations','user_id'
    ];
 
}
