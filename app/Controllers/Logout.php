<?php

namespace App\Controllers;
use App\Models\UserLoginModel;

class Logout extends BaseController
{

	public function index()
	{
	  session()->remove('logged_in');
	  session()->destroy();

	  return redirect() -> to(base_url()."/login");
	}
}
