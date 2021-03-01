<?php

namespace App\Imports;

use App\Models\PassageUhf;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class PassageUhfImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new PassageUhf([
            'date'     => $row[1],
            'voie_id'    => $row[2],
            'site_id'    => $row[3],
            'vacation_6h'    => $row[4],
            'vacation_14h'    => $row[5],
            'vacation_20h'    => $row[6],
            'passage_gate'=> $row[7],
            'somme_total_trafic'    => $row[8],
            'somme_total_recette_equialente'    => $row[9],
            'paiement_espece_defaut_provision'    => $row[10],
            'paiement_espece_dysfon'    => $row[11],
            'observations'    => $row[12],
            'user_id'    => $row[13],
            'created_at'    => $row[15],
            'updated_at'    => $row[16],
            ]);
        //
    }
}
