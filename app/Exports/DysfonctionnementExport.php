<?php

namespace App\Exports;

use App\Models\Dyfonctionnement;
use Maatwebsite\Excel\Concerns\FromCollection;

class DysfonctionnementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Dyfonctionnement::all();

    }
}
