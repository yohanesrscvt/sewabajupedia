<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeRoleController extends Controller
{
    public function SetRoleToCustomer(){
        if(session()->has('LoginID') && session()->has('UserRole') && session()->get('UserRole') == 'Agent') {
            session(['UserRole' => 'Customer']);
            return redirect('/dashboard/customer');
        }
    }

    public function SetRoleToAgent(){
        if(session()->has('LoginID') && session()->has('UserRole') && session()->get('UserRole') == 'Customer') {
            session(['UserRole' => 'Agent']);
            return redirect('/dashboard/agent');
        }
    }
}