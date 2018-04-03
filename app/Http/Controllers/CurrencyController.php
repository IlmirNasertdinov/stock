<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class CurrencyController extends Controller
{
	public function index()
	{
		$data = Storage::disk('local')->get('stocks.json');
		$data = json_decode($data, true);
		return view('welcome',compact('data'));
	}
	
}
