<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder for database
use Illuminate\Support\Facades\Storage; // upload
use Illuminate\Http\File; // file

class PakaianController extends Controller
{
    public function ShowAddPakaian(){
        $KategoriData = DB::table('kategoris')
                        ->get();
        $SizeData = DB::table('sizes')
                    ->get();
        return view('agent-role\add-pakaian',['Kategori' => $KategoriData,'Size' => $SizeData]);
    }

    public function PerformAddPakaian(Request $request){
        $DigitID = rand(0,9) . '' . rand(0,9) . '' . rand(0,9) . '' . rand(0,9);
        $GenerateID = 'CLOT' . $DigitID;
        DB::table('pakaians')->insert([
            'PakaianID' => $GenerateID,
            'AgentID' => session()->get('LoginID'),
            'KategoriID' => $request->kategori,
            'SizeID' => $request->size,
            'PakaianNama' => $request->nama,
            'PakaianHarga' => $request->harga,
            'PakaianGambar' => $request->file('gambar')->store('cloth-images'),
            'PakaianDeskripsi' => $request->deskripsi,
            'StockQty' => $request->stock,
            'PakaianRating' => 0
        ]);
        return redirect('/dashboard/agent');
    }
}
