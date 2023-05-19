<?php

namespace App\Http\Controllers;

use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Imports\YourImportClass;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    //
    public function import(Request $request)
{

    $tamp = [];
    $data = Excel::toArray(new YourImportClass(), request()->file('excel_file'));
    // dd(request()->file('excel_file'));
    if ( $xlsx = SimpleXLSX::parse(request()->file('excel_file')) ) {
        foreach ($xlsx->rows() as $key => $item) {
            if($key> 5){
                $arr = [
                    'nama_produk'	=> $item[0],
                    'satuan' => $item[1],
                    'warna' => $item[2],
                    'bentuk' =>$item[3],
                    'ukuran_dimensi' => $item[4],
                    'kategori'=> $item[5],
                    'jenis_inventory'=> $item[6],
                    'harga_beli' => $item[7],
                    'harga_jual' => $item[8],
                    'deskripsi' => $item[9]
                ];

                array_push($tamp,$arr);
            }
            # code...
        }
        // dd($xlsx->rows());
    } else {
        echo SimpleXLSX::parseError();
    }
    


    // foreach ($data as $key => $row) {
    //     foreach ($row as $key2 => $item) {
    //         # code...
    //         if($key2 > 4){
    //             $arr = [
    //                 'nama_produk'	=> $item['list_produk'],
    //                 'satuan' => $item[1],
    //                 'warna' => $item[2],
    //                 'bentuk' =>$item[3],
    //                 'ukuran_dimensi' => $item[4],
    //                 'kategori'=> $item[5],
    //                 'jenis_inventory'=> $item[6],
    //                 'harga_beli' => $item[7],
    //                 'harga_jual' => $item[8],
    //                 'deskripsi' => $item[9]
    //             ];

    //             array_push($tamp,$arr);
    //         }
    //     }
    // }
    // dd($tamp);
    // return redirect()->back()->with('success', 'Excel file imported successfully.');


    return view('welcome', ['data'=>$tamp]);
}

}
