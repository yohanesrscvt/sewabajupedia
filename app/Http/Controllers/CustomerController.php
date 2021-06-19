<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // query builder for database

class CustomerController extends Controller
{
    // show kategori
    public function ShowKategori(){
        $KategoriData   =   DB::table('kategoris')->get();
        return view('customer-role\kategori',['KategoriData' => $KategoriData]);
    }

    // show pakaian based kategori id
    public function PakaianBasedKategori($id){
        $PakaianList    =   DB::table('pakaians')
                            ->where('KategoriID',$id)
                            ->where('AgentID','!=',session()->get('LoginID'))
                            ->where('StockQty','>',0)
                            ->get();
        return view('customer-role\pakaian',['PakaianList' => $PakaianList]);
    }
}
