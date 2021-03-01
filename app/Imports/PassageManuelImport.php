<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;


class PassageManuelImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new PassageManuelImport([
            'date'     => $row[1],
            'voie_id'    => $row[2],
            'site_id'    => $row[3],
            'vacation'    => $row[4],
            'identite_percepteur'    => $row[5],
            'point_traf_info_mode_manuel'    => $row[6],
            'solde_recette_info_mode_manuel'=> $row[7],
            'heure_debutComptage'    => $row[8],
            'heure_finComptage'    => $row[9],
            'trafic_compteManu'    => $row[10],
            'equipRecette'    => $row[11],
            'etaDonne_taficInformatiser'    => $row[12],
            'etaDonne_recetteInformatiser'    => $row[13],
            'etaFinal_recetteInformatiser'    => $row[14],
            'etaFinal_taficInformatiser' => $row[15],
            'observation' => $row[16],
            'user_id'    => $row[17],
            'created_at'    => $row[18],
            'updated_at'    => $row[19],
            ]);
        //
    }
}
