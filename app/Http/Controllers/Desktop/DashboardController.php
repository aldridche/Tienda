<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
   {

         return view('dashboard');
   }

   public function modelweb()
   {
      return view('modelweb');
   }
}
