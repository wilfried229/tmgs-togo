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
            'pl'    => $row[14],
            'nbre_exempte' => $row[15],
            'violation' => $row[16],
            'total'    => $row[17],
            'observation'    => $row[18],
            'user_id'    => $row[19],
            'created_at'    => $row[20],
            'updated_at'    => $row[21],
            ]);
    }
}
