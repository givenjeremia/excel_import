<?php

namespace App\Imports;

// use Maatwebsite\Excel\Concerns\ToCollection;
// use Illuminate\Support\Collection;

// class YourImportClass implements ToCollection
// {
//     public function collection(Collection $rows)
//     {
//         // Process the imported data here
//         $tamp = ['dasda'];
//         foreach ($rows as $key => $row) {
//             if($key >3 ){

//                 // Access each row's data and perform necessary operations
//                 $column1 = $row[0];
//                 $column2 = $row[1];
    
//                 // You can perform any required operations on the data
//                 // For example, you can validate, manipulate, or store the data temporarily
    
//                 // Example: Output the data
//                 echo "Column 1: " . $column1 . ", Column 2: " . $column2 . "\n";
//             }
//         }
//         return $tamp;
//     }
// }
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class YourImportClass implements WithHeadingRow, ToArray
{
    public function array(array $row)
    {
        // Access each row's data and return as an array
        return $row;
    }
}

