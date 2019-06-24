<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class vendor_controll extends Controller
{
	public  function signup(Request $r)
	{
		return view('auth.register');
	}



	public  function edit_profile(Request $r)//function for view vendor profile
	{
		return view('edit_profile');
	}


	public  function edit(Request $r)//function for view edit page of vendor
	{
		echo "helo";
	}
	public function logout(Request $request)
{
   // $this->guard()->logout();
   auth()->logout();
   return redirect('/');
}
		
		


 }
