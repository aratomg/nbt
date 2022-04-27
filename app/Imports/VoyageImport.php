<?php

namespace App\Imports;

use App\Models\Voyage;
use Maatwebsite\Excel\Concerns\ToModel;

class VoyageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Voyage([
            'chauffeur'     => $row[0],
           'etc'    => $row[1],
        ]);
    }
}
