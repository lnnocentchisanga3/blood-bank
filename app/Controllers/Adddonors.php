<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\AddDonorsModel;
use App\Models\DonationSitesModel;


/**
 * 
 */
class Adddonors extends Controller
{
	public $saveDonorsModel;
	public $session;
	public $sites;
	
	function __construct()
	{
		helper('form');
		$this->$alldonors = new GetAllDonors();
		$this->saveDonorsModel = new AddDonorsModel();
		$this->session = session();
		$this->sites = new DonationSitesModel();
	}

	public function index($hospital_id)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$getuser = session('logged_in', $user);
		$rules = [
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

					$sample_id = $this->request->getVar('sampleid');
					$donor_fname = $this->request->getVar('fnames');
					$donor_mname = $this->request->getVar('mnames');
					$donor_lname = $this->request->getVar('lnames');
					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = $this->request->getVar('dod');
					$date_of_next_donation = $this->request->getVar('donextd');
					$site = $this->request->getVar('site');
					$group = $this->request->getVar('group');
					$district_id = $this->request->getVar('district');
					$province_id = $this->request->getVar('province');

					$dateod = str_replace("-","/",$date_of_donation);
					$dateod1 = str_replace("-","/",$date_of_next_donation);
						
				

			if ($this->saveDonorsModel->saveDonors($sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$dateod,$dateod1,$site,$hospital_id,$province_id,$district_id) === true) {
				session()->setTempdata('Success','Donors are added successfully', 3);
					return redirect()->to(base_url()."/adddonors/".$hospital_id);
			}else{
				session()->setTempdata('error','Donors are added successfully', 3);
					return redirect()->to(base_url()."/adddonors/".$hospital_id);
			}
			

		}
		$data['title'] = 'Adding a Donors';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		return view('adddonors',$data);
	}


	public function dataentry($hospital_id)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		
		$data = [];
		$getuser = session('logged_in', $user);
		$rules = [
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

				if ($this->validate($rules)) {

					$sample_id = $this->request->getVar('sampleid');
					$donor_fname = $this->request->getVar('fnames');
					$donor_mname = $this->request->getVar('mnames');
					$donor_lname = $this->request->getVar('lnames');
					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = $this->request->getVar('dod');
					$date_of_next_donation = $this->request->getVar('donextd');
					$site = $this->request->getVar('site');
					$group = $this->request->getVar('group');
					$district_id = $this->request->getVar('district');
					$province_id = $this->request->getVar('province');

					$dateod = str_replace("-","/",$date_of_donation);
					$dateod1 = str_replace("-","/",$date_of_next_donation);
						
				

			if ($this->saveDonorsModel->saveDonors($sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$datedo,$datedo1,$site,$hospital_id,$province_id,$district_id) === true) {
				session()->setTempdata('Success','Donors are added successfully', 3);
					return redirect()->to(base_url().'/dataentry/'.$hospital_id);
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}
		$data['title'] = 'Adding a Donors';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		return view('donordataclerk/adddonors',$data);
	}


	public function oneAdddonor($hospital_id)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$getuser = session('logged_in', $user);
		// $rules = [
		// 	'dod' => 'required',
		// 	'donextd' => 'required',
		// 	'site' => 'required',
		// 	'sampleid' => 'required',
		// 	'fnames' => 'required',
		// 	'mnames' => 'required',
		// 	'lnames' => 'required',
		// 	'dateob' => 'required',
		// 	''

		// 	  ];
		

			if ($this->request->getMethod() == "post") {

				// if ($this->validate($rules)) {

					$sample_id = $this->request->getVar('sampleid');
					$donor_fname = $this->request->getVar('fnames');
					$donor_mname = $this->request->getVar('mnames');
					$donor_lname = $this->request->getVar('lnames');

					$dateob = $this->request->getVar('dateofbirth');
					$gender = $this->request->getVar('gender');
					$occupation = $this->request->getVar('occupation');
					$doldon = $this->request->getVar('doldon');
					$sod = $this->request->getVar('sod');
					$postaladdress = $this->request->getVar('postaladdress');
					$email = $this->request->getVar('email');
					$phone = $this->request->getVar('phone');
					$numofdonation = $this->request->getVar('numofdonation');

					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = date('Y/m/d');
					$date_of_next_donation = str_replace("-","/",$this->request->getVar('donextd'));
					$site = $this->request->getVar('site');
					$group = $this->request->getVar('group');
					$district_id = $this->request->getVar('district');
					$province_id = $this->request->getVar('province');
						
				

			if ($this->saveDonorsModel->saveDonorOne($sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$date_of_donation,$date_of_next_donation,$site,$hospital_id,$province_id,$district_id,$dateob,$gender,$occupation,$doldon,$sod,$postaladdress,$email,$phone,$numofdonation) === true) {
				session()->setTempdata('Success','Donor Record has been added successfully', 3);
					return redirect()->to(base_url()."/oneAdddonor/".$hospital_id);
			}else{
				session()->setTempdata('Success','Error occured while saving the Record', 3);
					return redirect()->to(base_url()."/oneAdddonor/".$hospital_id);
			}
			/*var_dump($status);*/

		// 	}else{
		// 	$data['validation'] = $this->validator;
		// }

		}
		$data['title'] = 'Adding Donor Details';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		return view('oneDonorAdd',$data);
	}
}


?>