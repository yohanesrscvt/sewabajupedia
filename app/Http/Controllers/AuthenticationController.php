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

    public function ShowCustomerDashboard(){
        // fetch data function
        $CustomerData = DB::table('customers')
                        ->where('CustomerID',session()->get('LoginID'))
                        ->get();
        return view('dashboard',['CustomerData' => $CustomerData, 'role' => 'Customer']);
    }

    public function ShowAgentDashboard(){
        // agent fetch data function
        $AgentData = DB::table('agents')
                        ->where('AgentID',session()->get('LoginID'))
                        ->get();
        
        // pakaian based on agent fetch data function
        $PakaianData =  DB::table('pakaians')
                        ->join('agents','pakaians.AgentID','=','agents.AgentID')
                        ->where('pakaians.AgentID',session()->get('LoginID'))
                        ->get();
        return view('dashboard',['AgentData' => $AgentData , 'PakaianData' => $PakaianData, 'role' => 'Agent']);
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
            $NewCustomer->CustomerPhone = "";
            $NewCustomer->CustomerSaldo = 0;
            $NewCustomer->CustomerPicturePath = "profile-images/blank-profile-picture-973460_1280.png";
            $NewCustomer->CustomerAlamat = "";
            $CustomerAddAccountStatus = $NewCustomer->save();

            if($CustomerAddAccountStatus) $InsertSuccess++;

            // insert agent's data
            $NewAgent = new agent();
            $NewAgent->AgentID = $GenerateID;
            $NewAgent->AgentNama = $request->nama;
            $NewAgent->AgentEmail = $request->email;
            $NewAgent->AgentPassword = $HashPassword;
            $NewAgent->AgentPhone = "";
            $NewAgent->AgentSaldo = 0;
            $NewAgent->AgentPicturePath = "profile-images/blank-profile-picture-973460_1280.png";
            $NewAgent->AgentAlamat = "";
            $NewAgent->AgentRating = 0;
            $AgentAddAccountStatus = $NewAgent->save();

            if($AgentAddAccountStatus) $InsertSuccess++;

            // return result
            if($InsertSuccess == 2) return redirect('/login');
            else return back()->with('fail','Something wrong, please try again later :(');
        }
    }
    
    public function AccountLogin(Request $request){
        // default login role -> customer
        // customer and agent have same id and email
        // reference : https://www.youtube.com/watch?v=UGW01ttsfpQ&ab_channel=IrebeLibrary

        $CustomerLogin = customer::where('CustomerEmail','=',$request->email)->first();
        if($CustomerLogin){
            if(Hash::check($request->password,$CustomerLogin->CustomerPassword)){
                session()->put('LoginID',$CustomerLogin->CustomerID);
                session()->put('UserRole','Customer'); // default login as customer (session)
                return redirect('/dashboard/customer');
            }
            else{
                return back()->with('fail','Invalid input');
            }
        }
        else return back()->with('fail','Account does not exists');
    }
    public function AccountLogout(){
        // reference : https://www.youtube.com/watch?v=UGW01ttsfpQ&ab_channel=IrebeLibrary
        if(session()->has('LoginID') && session()->has('UserRole')){
            session()->pull('LoginID');
            session()->pull('UserRole');
            session()->flush();
            return redirect('/login');
        }
    }

    public function UnderMaintenance(){
        return view('notfound');
    }
}