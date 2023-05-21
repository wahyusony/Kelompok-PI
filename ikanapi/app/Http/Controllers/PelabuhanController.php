<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelabuhan;

class PelabuhanController extends Controller
{
 public function index()
 {
 dd('index method called');
 $pelabuhans = Pelabuhan::all();
 return view('home', ['pelabuhans' => $pelabuhans]);
 
 }
}
