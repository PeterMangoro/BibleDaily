<?php

namespace App\Imports;

use App\Models\BibleBook;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BibleBookImport implements ToModel,WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new BibleBook([
           'alais'=> $row[2],
'title'=> $row[3],
'chapters'=> $row[4],
'testament'=> $row[5],
        ]);
    }
}
