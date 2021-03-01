<?php

namespace App\Imports;

use App\Models\Dyfonctionnement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class DysfonctionnementImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Dyfonctionnement([
            'site_id'     => $row[1],
            'date'     => $row[2],
            'localisation'    => $row[3],
            'dysfonctionnement'    => $row[4],
            'cause'    => $row[5],
            'travauxArealiser'    => $row[6],
            'travauxRealiser'    => $row[7],
            'heureConstat'=> $row[8],
            'heureDebutIntervention'    => $row[9],
            'heureFinIntervention'    => $row[10],
            'resultatObtenir'    => $row[11],
            'besoins'    => $row[12],
            'preuve_avant'    => $row[13],
            'preuve_apres'    => $row[14],
            'observation'    => $row[15],
            'user_id'    => $row[16],
            'created_at'    => $row[17],
            'updated_at'    => $row[18],
            ]);
        //
    }
}
