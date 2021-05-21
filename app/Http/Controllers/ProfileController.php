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
        return redirect('/profile/main');
    }

    public function ShowDeleteProfileMenu(){
        return view('profile\delete');
    }

    public function PerformDelete(Request $request){

    }
}
