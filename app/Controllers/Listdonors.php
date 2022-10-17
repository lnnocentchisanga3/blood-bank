<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;


/**
 * 
 */
class Listdonors extends Controller
{
	public $alldonors;
	public $session;
	public $sites;
	
	function __construct()
	{
		helper('form');
		$this->alldonors = new GetAllDonors();
		$this->sites = new DonationSitesModel();
		$this->session = session();
	}

	public function index($hospital=null)
	{
		

		$data = [];
		$data['title'] = 'List of all the donors';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		$data['userdata'] = session('logged_in', $user);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		return view('listdonors',$data);
	}

	public function listdata($hospital=null)
	{
		

		$data = [];
		$data['title'] = 'List of all the donors';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		$data['userdata'] = session('logged_in', $user);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		return view('donordataclerk/listdonors',$data);
	}

	public function delete($id=null,$hospital_id=null){
		if ($this->sites->deleteDonorRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdonors/'.$hospital_id);
		}
	}

	public function edit_donor($id=null,$hospital_id=null){

		$data = [];

		if ($this->request->getMethod() === 'post') {
			// $donor_data = [
			// 		'sample_id' => $this->request->getVar('sampleid'),
			// 		'donor_fname' => $this->request->getVar('names'),
			// 		'donor_mname' => $this->request->getVar('names'),
			// 		'donor_lname' => $this->request->getVar('names'),
			// 		'hiv' => $this->request->getVar('hiv'),
			// 		'hbv' => $this->request->getVar('hbv'),
			// 		'hcv' => $this->request->getVar('hcv'),
			// 		'syphilis' => $this->request->getVar('syphilis'),
			// 		'comment' => $this->request->getVar('comment'),
			// 		'date_of_donation' => $this->request->getVar('dod'),
			// 		'date_of_next_donation' => $this->request->getVar('donextd'),
			// 		'site_id' => $this->request->getVar('site'),
			// 		'hospital_id' => $hospital_id,
			// 		'district_id' => $this->request->getVar('district'),
			// 		'province_id' => $this->request->getVar('province'),
			// 	];

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
					$hospital_id = $hospital_id;
					$district_id = $this->request->getVar('district');
					$group = $this->request->getVar('group');
					$province_id = $this->request->getVar('province');

				if ($this->sites->update_donor($id,$sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$comment,$date_of_donation,$date_of_next_donation,$site,$hospital_id,$province_id,$district_id,$group) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/listdonors/'.$hospital_id);
				}
		}
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->find($id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);

		return view('editdonordetials',$data);
	}

	public function delete_data($id=null,$hospital_id=null){
		if ($this->sites->deleteDonorRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdata/'.$hospital_id);
		}
	}

	public function edit_donor_data($id=null,$hospital_id=null){

		$data = [];

		if ($this->request->getMethod() === 'post') {
			// $donor_data = [
			// 		'sample_id' => $this->request->getVar('sampleid'),
			// 		'donor_fname' => $this->request->getVar('names'),
			// 		'donor_mname' => $this->request->getVar('names'),
			// 		'donor_lname' => $this->request->getVar('names'),
			// 		'hiv' => $this->request->getVar('hiv'),
			// 		'hbv' => $this->request->getVar('hbv'),
			// 		'hcv' => $this->request->getVar('hcv'),
			// 		'syphilis' => $this->request->getVar('syphilis'),
			// 		'comment' => $this->request->getVar('comment'),
			// 		'date_of_donation' => $this->request->getVar('dod'),
			// 		'date_of_next_donation' => $this->request->getVar('donextd'),
			// 		'site_id' => $this->request->getVar('site'),
			// 		'hospital_id' => $hospital_id,
			// 		'district_id' => $this->request->getVar('district'),
			// 		'province_id' => $this->request->getVar('province'),
			// 	];

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
					$hospital_id = $hospital_id;
					$district_id = $this->request->getVar('district');
					$group = $this->request->getVar('group');
					$province_id = $this->request->getVar('province');

				if ($this->sites->update_donor($id,$sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$comment,$date_of_donation,$date_of_next_donation,$site,$hospital_id,$province_id,$district_id,$group) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/listdata/'.$hospital_id);
				}
		}
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->find($id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);

		return view('donordataclerk/editdonordetials',$data);
	}
}


?>