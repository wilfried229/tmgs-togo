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
            'date'     => $row[0],
            'voie_id'    => $row[1],
            'site_id'    => $row[2],
            'vacation'    => $row[3],
            'agent_voie'    => $row[4],
            'montant'    => $row[5],
            'recette_informatiser'=> $row[6],
            'recette_declarer'    => $row[7],
            'manquant'    => $row[8],
            'supplus'    => $row[9],
            'vl'    => $row[10],
            'mini_bus'    => $row[11],
            'autocars_camion'    => $row[12],
            'pl'    => $row[13],
            'nbre_exempte' => $row[14],
            'violation' => $row[15],
            'total'    => $row[16],
            'observation'    => $row[17],
            'user_id'    => $row[18],
            'created_at'    => $row[19],
            'updated_at'    => $row[20],

            ]);
    }
}
