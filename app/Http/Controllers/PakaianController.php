<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PakaianController extends Controller
{
    public function ShowAddPakaian(){
        return view('agent-role\add-pakaian');
    }
}
