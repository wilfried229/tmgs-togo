<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassageUhf extends Model
{
    //

    protected $table = "Passage_Uhf";

    protected $fillable =['date','voie_id','site_id','vacation_6h','vacation_14h', 'vacation_20h','type_passage_offline','type_passage_online',
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
