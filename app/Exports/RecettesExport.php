<?php

namespace App\Exports;

use App\Models\RecetesTrafic;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecettesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return RecetesTrafic::all();
    }


}
