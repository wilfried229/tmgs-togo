<?php

namespace App\Exports;

use App\Models\Comptage;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComptagesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Comptage::all();

    }
}
