<?php

namespace App\Imports;

// use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;

class AprendicesImport implements ToArray
{

    public function array(array $rows)
    {
        // dd($rows);
        // foreach ($rows as $row) 
        // {
        //     // User::create([
        //     //     'name' => $row[0],
        //     // ]);
        // }
        return $rows;
    }
}