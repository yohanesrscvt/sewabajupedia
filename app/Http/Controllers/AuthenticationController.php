<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // hashing password
use Illuminate\Support\Facades\DB; // query builder for database

// for models
use App\Models\agent;
use App\Models\customer;

class AuthenticationController extends Controller
{
    public function ShowLogin(){
        return view('authentication-form\login');
    }

    public function ShowRegister(){
        return view('authentication-form\register');
    }

    public function AddNewAccount(Request $request){
        // declare new variables for CustomerID and AgentID
        $DigitID = rand(0,9) . '' . rand(0,9) . '' . rand(0,9) . '' . rand(0,9);
        $GenerateID = "USER-" . $DigitID;

        // validate if password and confirm-password are equals
        if($request->password != $request->confirm_password){
            return back()->with('fail','The password and confirm password must match');
        }

        // validate unique email
        // in this case, customer and agent have same email, so we can choose one both customer's and agent's email to be validated
        $EmailSearch =  DB::table('customers')
                        ->where('CustomerEmail',$request->email)
                        ->count();
        if($EmailSearch == 1){ // data found then return error
            return back()->with('fail','The email you entered already exists');
        }

        else if ($EmailSearch == 0){ // data not found then insert new data
            $InsertSuccess = 0;
            $HashPassword = Hash::make($request->password);
            
            // insert customer's data
            $NewCustomer = new customer();
            $NewCustomer->CustomerID = $GenerateID;
            $NewCustomer->CustomerNama = $request->nama;
            $NewCustomer->CustomerEmail = $request->email;
            $NewCustomer->CustomerPassword = $HashPassword;
            $NewCustomer->CustomerSaldo = 0;
            $NewCustomer->CustomerPicturePath = "";
            $CustomerAddAccountStatus = $NewCustomer->save();

            if($CustomerAddAccountStatus) $InsertSuccess++;

            // insert agent's data
            $NewAgent = new agent();
            $NewAgent->AgentID = $GenerateID;
            $NewAgent->AgentNama = "";
            $NewAgent->AgentEmail = $request->email;
            $NewAgent->AgentPassword = $HashPassword;
            $NewAgent->AgentSaldo = 0;
            $NewAgent->AgentPicturePath = "";
            $AgentAddAccountStatus = $NewAgent->save();

            if($AgentAddAccountStatus) $InsertSuccess++;

            // return result
            if($InsertSuccess == 2) return redirect('/login');
            else return back()->with('fail','Something wrong, please try again later :(');
        }
    }
}
