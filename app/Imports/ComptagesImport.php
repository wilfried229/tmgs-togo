<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ComptagesImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new ComptagesImport([
            'date' => $row[1],
            'voie_id' => $row[2],
            'site_id' => $row[3],
            'vacation' => $row[4],
            'nbre_passageManuel' => $row[5],
            'nbre_passageSysteme' => $row[6],
            'montantManuel'=> $row[7],
            'montantInformatiser' => $row[8],
            'observation' => $row[9],
            'user_id' => $row[10],
            'created_at' => $row[11],
            'updated_at' => $row[12],
            ]);
        //
    }
}
