<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepoAirMinum;

class DashboardController extends Controller
{
    public function salesA(){
    	$data = DepoAirMinum::whereNotNull('ID_SALES_A')->get();
    	return view('sales-a/dashboard')->with(compact("data"));
    }

    public function salesB(){
    	// $data = DepoAirMinum::whereNotNull('ID_SALES_A')->get();
    	return view('sales-b/dashboard');
    }
}
