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
        return redirect('/dashboard/agent')->with('success','Item successfully added');
    }

    public function ShowEditPakaian($id){
        $PakaianData =  DB::table('pakaians')
                        ->where('PakaianID',$id)
                        ->where('AgentID',session()->get('LoginID'))
                        ->get();
        
        $KategoriData = DB::table('kategoris')
                        ->get();
        
        $SizeData = DB::table('sizes')
                    ->get();
        
        return view('agent-role\edit-pakaian',['PakaianData' => $PakaianData,'Kategori' => $KategoriData,'Size' => $SizeData]);
    }

    public function PerformEditPakaian(Request $request){
        if($request->hasFile('gambar') == false){
            DB::table('pakaians')
            ->where('PakaianID',$request->id)
            ->where('AgentID',session()->get('LoginID'))
            ->update([
                'KategoriID' => $request->kategori,
                'SizeID' => $request->size,
                'PakaianNama' => $request->nama,
                'PakaianHarga' => $request->harga,
                'PakaianDeskripsi' => $request->deskripsi,
                'StockQty' => $request->stock
            ]);
        }
        else{
            DB::table('pakaians')
            ->where('PakaianID',$request->id)
            ->where('AgentID',session()->get('LoginID'))
            ->update([
                'KategoriID' => $request->kategori,
                'SizeID' => $request->size,
                'PakaianNama' => $request->nama,
                'PakaianHarga' => $request->harga,
                'PakaianDeskripsi' => $request->deskripsi,
                'StockQty' => $request->stock,
                'PakaianGambar' => $request->file('gambar')->store('cloth-images')
            ]);
        }
        return redirect('/dashboard/agent')->with('success','Item successfully editted');;
    }

    public function PerformDeletePakaian($id){
        DB::table('pakaians')
        ->where('PakaianID',$id)
        ->where('AgentID',session()->get('LoginID'))
        ->delete();

        return redirect('/dashboard/agent')->with('success','Item successfully deleted');;
    }
}
