<?php

namespace App\Exports;

use App\Models\PointPassageMaunel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassageManuelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return PointPassageMaunel::all();

    }
}
