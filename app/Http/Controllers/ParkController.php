<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class ParkController extends Controller
{
    public function create(){
        $rates = DB::table('rates')->get();
        return view ('transaksi',compact('rates'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'platNomor' => 'required|exists:Vehicles',
                'jenis' => 'required|gt:0',
                'jamMasuk' => 'required',
                'jamKeluar' => 'required|after:jamMasuk'
        ],
        [
            'jenis.gt' => 'Pilih terlebih dahulu',
            'jamKeluar.after'=>'Jam keluar harus lebih dari jam masuk',
            'platNomor.exists'=>'Plat Nomor: Input tidak terdaftar'
        ]
        );
        $t1=Carbon::parse($request->jamMasuk);
        $t2=Carbon::parse($request->jamKeluar);
        $selisih =$t1->diffInHours($t2+1);

        echo"<br>Jam Masuk: ". $request->jamMasuk;
        echo"<br>Jam Keluar: ". $request->jamKeluar;
        echo"<br>Selisih: ". $selisih;
        echo"<br>Hourly Rate: ". $request->jenis;
        echo"<br>Total Bayar: ".($selisih * $request->jenis);

    }

    //
}
