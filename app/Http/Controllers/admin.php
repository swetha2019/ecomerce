<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class admin extends Controller
{
   public function index()
   {
   	return view('Admin.adminlogin');
   }
   public function login(Request $requ)
   {
   
   $data= db::table('vendor_registration')->where('email',$request->input('email'))->Where( 'password', $request->input('password'))->get();

   
                       
   }
   public function vendor_detail()
   {
   	$data['array']=DB::table('vendor_registration')->where('usertype','vendor')->get();
   	return view('Admin.admihome',$data);
   }
   
}
