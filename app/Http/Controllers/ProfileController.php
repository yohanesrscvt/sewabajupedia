<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // DB
use Illuminate\Support\Facades\Hash; // hashing password
use Illuminate\Support\Facades\Storage; // upload
use Illuminate\Http\File;// file

class ProfileController extends Controller
{
    public function ShowProfileMenu(){
        // fetch data function
        // we choose customer as $UserData because both customer and agent have same data then show it
        $UserData = DB::table('customers')
                        ->where('CustomerID',session()->get('LoginID'))
                        ->get();
        return view('profile\profile',['UserData' => $UserData]);
    }

    public function ReturnBackDashboard(){
        if(session()->has('LoginID') && session()->has('UserRole') && session()->get('UserRole') == 'Agent'){
            return redirect('/dashboard/agent');
        }
        else{ // customer
            return redirect('/dashboard/customer');
        }
    }

    public function ShowEditProfileMenu(){
        // fetch data function
        // we choose customer as $UserData because both customer and agent have same data then show it
        $UserData = DB::table('customers')
                        ->where('CustomerID',session()->get('LoginID'))
                        ->get();
        return view('profile\edit',['UserData' => $UserData]);
    }

    public function PerformEdit(Request $request){
        $PicturePath =  $request->file_temp;
        if($request->hasFile('file')) $PicturePath = $request->file('file')->store('profile-images');
        
        if($request->password == "" && $request->confirm_password == ""){
            DB::table('customers')
                ->where('CustomerID',session()->get('LoginID'))
                ->update([
                    'CustomerNama' => $request->nama,
                    'CustomerPhone' => $request->phone,
                    'CustomerAlamat' => $request->alamat,
                    'CustomerPicturePath' => $PicturePath
            ]);

            DB::table('agents')
                ->where('AgentID',session()->get('LoginID'))
                ->update([
                    'AgentNama' => $request->nama,
                    'AgentPhone' => $request->phone,
                    'AgentAlamat' => $request->alamat,
                    'AgentPicturePath' => $PicturePath
            ]);
        }
        
        else{
            // validation
            if($request->password != $request->confirm_password){
                return back()->with('fail','The password and confirm password must match');
            }
            $pwd = Hash::make($request->password);
            DB::table('customers')
                ->where('CustomerID',session()->get('LoginID'))
                ->update([
                    'CustomerNama' => $request->nama,
                    'CustomerPhone' => $request->phone,
                    'CustomerAlamat' => $request->alamat,
                    'CustomerPicturePath' => $PicturePath,
                    'CustomerPassword' => $pwd
            ]);

            DB::table('agents')
                ->where('AgentID',session()->get('LoginID'))
                ->update([
                    'AgentNama' => $request->nama,
                    'AgentPhone' => $request->phone,
                    'AgentAlamat' => $request->alamat,
                    'AgentPicturePath' => $PicturePath,
                    'AgentPassword' => $pwd
            ]);
        }
        return redirect('/profile/main')->with('success','Your profile successfully updated');
    }

    public function ShowTopup(){
        return view('profile\topup');
    }

    public function TopUpSaldo(Request $r){
        DB::table('customers')
        ->where('CustomerID', session()->get('LoginID'))
        ->increment('CustomerSaldo',$r->saldo);
        
        DB::table('agents')
        ->where('AgentID', session()->get('LoginID'))
        ->increment('AgentSaldo',$r->saldo);

        return redirect('/profile/main')->with('success','Your balance successfully added');
    }

    public function ViewHistory(){
        // get transaction list
        $TransactionData = DB::table('transactions')
                    ->join('pakaians','transactions.PakaianID','=','pakaians.PakaianID')
                    ->where('transactions.CustomerID',session()->get('LoginID'))
                    ->get();
        return view('profile\history',['TransactionData' => $TransactionData]);
        // var_dump($TransactionData);
    }
}
