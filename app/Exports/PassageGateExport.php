<?php

namespace App\Exports;

use App\Models\PointPassage;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassageGateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return PointPassage::all();

    }
}
