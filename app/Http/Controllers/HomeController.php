<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Price;

class HomeController extends Controller
{

	public function index(){
		$rates = Price::get();
		return view('pages.index',['rates' => $rates]);
	}
}
