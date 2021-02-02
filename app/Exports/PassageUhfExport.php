<?php

namespace App\Exports;

use App\Models\PassageUhf;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassageUhfExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return PassageUhf::all();

    }
}
