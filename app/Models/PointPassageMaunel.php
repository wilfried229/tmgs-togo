<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PointPassageMaunel extends Model
{




    protected $table = "point_passage_manuelle";

    protected $fillable =['date','voie_id','site_id','vacation','identite_percepteur',
        'point_traf_info_mode_manuel','solde_recette_info_mode_manuel','heure_debutComptage','heure_finComptage',
        'trafic_compteManu','equipRecette','etaDonne_taficInformatiser','etaDonne_recetteInformatiser','etaFinal_taficInformatiser',
        'etaFinal_recetteInformatiser','observations','user_id'
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
