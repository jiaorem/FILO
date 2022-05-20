<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
   {
       if(Auth::user()->hasRole('admin')){
            return view('dashboard');
       }elseif(Auth::user()->hasRole('employee')){
            return view('employeedash');
   }
   }

   public function adminprof()
   {
    return view('adminprof');
   }

   public function employeeprof()
   {
    return view('employeeprof');
   }

   public function postcreate()
   {
    return view('postcreate');
   }
}
