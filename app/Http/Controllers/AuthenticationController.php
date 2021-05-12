<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // hashing password

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
        $GenerateCustomerID = "CUST-" . $DigitID;
        $GenerateAgentID = "AGEN-" . $DigitID;

        // validation
        // ...

        // customer
        $NewCustomer = new customer();
        $NewCustomer->CustomerID = $GenerateCustomerID;
        $NewCustomer->CustomerNama = $request->nama;
        $NewCustomer->CustomerEmail = $request->email;
        $NewCustomer->CustomerPassword = Hash::make($request->password);
        $NewCustomer->CustomerSaldo = 0;
        $NewCustomer->CustomerPicturePath = "";
        $CustomerAddAccountStatus = $NewCustomer->save();

        // agent
        $NewAgent = new agent();
        $NewAgent->AgentID = $GenerateAgentID;
        $NewAgent->AgentNama = $request->nama;
        $NewAgent->AgentEmail = $request->email;
        $NewAgent->AgentPassword = Hash::make($request->password);
        $NewAgent->AgentSaldo = 0;
        $NewAgent->AgentPicturePath = "";
        $AgentAddAccountStatus = $NewAgent->save();

        // insert status
        // ...
    }

    
}
