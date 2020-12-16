<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointPassage extends Model
{

 //
    protected $table = "point_passages";

    protected $fillable =['date','voie_id','site_id','vacation_6h','vacation_14h', 'vacation_20h','type_passage_offline','type_passage_online',
        'somme_total_trafic','somme_total_recette_equialente','paiement_espece_defaut_provision',
        'observations','user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
