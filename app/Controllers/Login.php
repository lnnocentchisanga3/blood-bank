<?php

namespace App\Controllers;
use App\Models\UserLoginModel;

class Login extends BaseController
{
    public $loginModel;
	public $session;

	function __construct()
	{
		helper('form');
		$this->loginModel = new UserLoginModel();
		$this->session = session();
	}

	public function index()
	{
		

		$data = [];
		$rules = [
			'email' => 'required|valid_email',
			'password' => 'required'
			  ];
		$data['title'] = "ZNBTS | Login";


		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				
					$email = $this->request->getVar('email');
					$password = $this->request->getVar('password');

					$userdata = $this->loginModel->verifyEmail($email,$password);

					$throttler = \Config\Services::throttler();
					$allowed = $throttler->check('auth',3,MINUTE);

					if ($allowed) {
						if ($userdata) {
						$this->session->set('logged_in',$userdata);
						return redirect()->to(base_url()."/dashboard");
					}else{

						$this->session->setTempdata('error','Sorry your credentials are Invalid',3);
						return redirect()->to(current_url());
					}
					}else{
						$data['loginerrors'] = "You have exceded your login attempts, please try again later";
					}
					}else{
						$data['validation'] = $this->validator;
					}
		}
		return view('auth/login',$data);
	}
}
