<?php

namespace App\Imports;

use App\Models\RecetesTrafic;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class RecettesImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //
        return new RecetesTrafic([
            'date'     => $row[1],
            'voie_id'    => $row[2],
            'site_id'    => $row[3],
            'vacation'    => $row[4],
            'agent_voie'    => $row[5],
            'montant'    => $row[6],
            'recette_informatiser'=> $row[7],
            'recette_declarer'    => $row[8],
            'manquant'    => $row[9],
            'supplus'    => $row[10],
            'vl'    => $row[11],
            'mini_bus'    => $row[12],
            'autocars_camion'    => $row[13],
            'roues2'    => $row[14],
            'tricycle'    => $row[15],
            'pl_2essieux'    => $row[16],
            'pl_3essieux'    => $row[17],
            'pl_4essieux'    => $row[18],
            'pl_5essieux'    => $row[19],
            'pl_6essieux'    => $row[20],
            'pl_7essieux'    => $row[21],
            'pl_8essieux'    => $row[22],
            'pl_9essieux'    => $row[23],
            'nbre_exempte' => $row[24],
            'violation' => $row[25],
            'total'    => $row[26],
            'observation'    => $row[27],
            'user_id'    => $row[30],
            'created_at'    => $row[31],
            'updated_at'    => $row[32],
            ]);
    }
}
