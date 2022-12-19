<?php

namespace App\Controllers;
use App\Models\UserLoginModel;

class Login extends BaseController
{
    public $loginModel;
	public $session;
	public $email;

	function __construct()
	{
		helper('form');
		$this->loginModel = new UserLoginModel();
		$this->session = session();
		$this->email = \Config\Services::email();
	}

	public function index()
	{
		$data = [];
		
		if (session()->has('logged_in')) {
			$user = session('logged_in');
			return redirect()->to(base_url()."/dashboard/".$user['hospital_id']);
		}
		
		
		$rules = [
			'email' => 'required',
			'password' => 'required'
			  ];
		$data['title'] = "ZNBTS | Login";
        $data['brand'] = "Blood Bank Database";

		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				
					$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
					$password = $this->request->getVar('password',FILTER_SANITIZE_STRING);

					$userdata = $this->loginModel->verifyEmail($email);

					$throttler = \Config\Services::throttler();
					$allowed = $throttler->check('auth',3,MINUTE);

					if ($allowed) {
					if ($userdata) {

						$hash_password = md5($password);

						if ($hash_password == $userdata['password']) {
							$this->session->set('logged_in',$userdata);
						return redirect()->to(base_url()."/dashboard/".$userdata['hospital_id']);
						}else{

							$this->session->setTempdata('error','Sorry the Password You Entered is Invalid',3);
							return redirect()->to(current_url());
						}
							
					}else{

						$this->session->setTempdata('error','Sorry Your User ID is Invalid',3);
						return redirect()->to(current_url());
					}
					}else{
						$this->session->setTempdata('error','You have exceded your login attempts, please try again later',3);
						return redirect()->to(current_url());
					}
					}else{
						$data['validation'] = $this->validator;
					}
						}

		// var_dump($userdata);
		return view('auth/login',$data);
	}

	public function users($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];

		$data['staffs'] = $this->loginModel->getStaffs($hospital_id);
		$data['userdata'] = session('logged_in');


		$data['title'] = "System Users";
		return view('staffs',$data);
	}

	public function editStaff($user_id,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];

		$data['staff'] = $this->loginModel->getStaffOne($user_id);
		$data['userdata'] = session('logged_in');
		$data['title'] = "System Users";

		if ($this->request->getMethod() == "post") {

					$fname = $this->request->getVar('firstname',FILTER_SANITIZE_STRING);
					$lname = $this->request->getVar('lastname',FILTER_SANITIZE_STRING);
					$username = $this->request->getVar('username',FILTER_SANITIZE_STRING);
					$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
					$password = $this->request->getVar('password;',FILTER_SANITIZE_STRING);
					$phone = $this->request->getVar('phone',FILTER_SANITIZE_STRING);
					$role = $this->request->getVar('role',FILTER_SANITIZE_STRING);
					$hospital = $this->request->getVar('hospital_id',FILTER_SANITIZE_STRING);
					$district_id = $this->request->getVar('district_id',FILTER_SANITIZE_STRING);
					$province_id = $this->request->getVar('province_id',FILTER_SANITIZE_STRING);
						
				

			if ($this->loginModel->updateStaff($fname,$lname,$username,$email,$password,$phone,$role,$hospital,$district_id,$province_id,$user_id) === true) {
				session()->setTempdata('Success','Staff has been updated successfully', 3);
					return redirect()->to(base_url()."/editStaff/$user_id/".$hospital_id);
			}else{
				session()->setTempdata('error','Opps, Something went wrong', 3);
					return redirect()->to(base_url()."/editStaff/$user_id/".$hospital_id);
			}

		}

		return view('editstaff',$data);
	}

	public function adduser($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$data['userdata'] = session('logged_in');
		$data['title'] = "Adding Staff Members";

		$rules = [
			'firstname' => 'required',
			'lastname' => 'required',
			'username' => 'required',
			'email' => 'required | valid_email',
			'phone' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

				// if ($this->validate($rules)) {

					$fname = $this->request->getVar('firstname',FILTER_SANITIZE_STRING);
					$lname = $this->request->getVar('lastname',FILTER_SANITIZE_STRING);
					$username = $this->request->getVar('username',FILTER_SANITIZE_STRING);
					$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
					$password = md5(123);
					$phone = $this->request->getVar('phone',FILTER_SANITIZE_STRING);
					$role = $this->request->getVar('role',FILTER_SANITIZE_STRING);
					$hospital = $this->request->getVar('hospital_id',FILTER_SANITIZE_STRING);
					$district_id = $this->request->getVar('district_id',FILTER_SANITIZE_STRING);
					$province_id = $this->request->getVar('province_id',FILTER_SANITIZE_STRING);
						
				

			if ($this->loginModel->saveStaff($fname,$lname,$username,$email,$password,$phone,$role,$hospital,$district_id,$province_id) === true) {
				session()->setTempdata('Success','Staff has been added successfully', 3);
					return redirect()->to(base_url()."/addstaff/".$hospital_id);
			}else{
				session()->setTempdata('error','Opps, Something went wrong', 3);
					return redirect()->to(base_url()."/addstaff/".$hospital_id);
			}
			/*var_dump($status);*/

		// 	}else{
		// 	$data['validation'] = $this->validator;
		// }

		}

		return view('addstaff',$data);
	}

	public function deleteUser($user_id,$hospital_id)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		if ($this->loginModel->deleteuser($user_id)) {
			session()->setTempdata('Success','Staff is been Deleted', 3);
				return redirect()->to(base_url().'/users/'.$hospital_id);
		}else{
			session()->setTempdata('error','Opps Something went wrong try again', 3);
				return redirect()->to(base_url().'/users/'.$hospital_id);
		}
	}

	public function about_developer()
	{
		$data=[];
		$data['userdata'] = session('logged_in');
		if ($this->request->getMethod() == "post") {
			
			$name = $this->request->getVar('name',FILTER_SANITIZE_STRING);
			$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
			$subject = $this->request->getVar('subject',FILTER_SANITIZE_STRING);
			$message = $this->request->getVar('message',FILTER_SANITIZE_STRING);

			$this->email->setTo($email);
			$this->email->setFrom($name);
			$this->email->setSubject($subject);
			$this->email->setMessage($message);

			if ($this->email->send()) {
				session()->setTempdata('Success','Your message has been sent. Thank you!', 3);
				return redirect()->to(base_url().'/Login/about_developer#contact');
			}else{

				$debuger = $this->email->printDebugger(['headers']);
				session()->setTempdata('error','Opps Something went wrong, Please try again', 3);
				return redirect()->to(base_url().'/Login/about_developer#contact');
			}

		}
		$data['title'] = 'About a Developer';
		return view('about_a_developer',$data);
	}
}
