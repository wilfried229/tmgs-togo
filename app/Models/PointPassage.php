<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;
class PointPassage extends Model
{

 //
    protected $table = "point_passages";

    protected $fillable =['date','voie_id','site_id','vacation_6h','vacation_14h', 'vacation_20h','passage_gate',
        'somme_total_trafic','somme_total_recette_equialente','paiement_espece_defaut_provision','paiement_espece_dysfon',
        'observations','user_id'
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
