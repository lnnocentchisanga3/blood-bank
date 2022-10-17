<?php 
namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\Statistics;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;



/**
 * 
 */
class DonorSection extends BaseController
{
	public $adminModel;
	public $session;
	public $statistics1;
	public $sites;

	function __construct()
	{
		helper('form');
		$this->adminModel = new AdminModels();
		$this->alldonors = new GetAllDonors();
		$this->sites = new DonationSitesModel();
		$this->session = session();
		$this->statistics1 = new Statistics();
	}

	public function index($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$data = [];

		$data['hiv'] = $this->adminModel->hivNum($hospital_id);
		$data['hbv'] = $this->adminModel->hbvNum($hospital_id);
		$data['hcv'] = $this->adminModel->hcvNum($hospital_id);
		$data['syphilis'] = $this->adminModel->syphilisNum($hospital_id);
		$data['alldonors'] = $this->adminModel->getDonors($hospital_id);
		$data['statistics1'] = $this->statistics1->getStatistics1($hospital_id);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital_id)->where('donation_sites.hospital_id',$hospital_id)->groupBy('serial_number','DESC')->findAll();
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		


		$data['title'] = "Dashboard | Donor Section";
		return view('donorsection/index',$data);
	}

	public function listdonors($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		

		$data = [];
		$data['title'] = 'List of all the donors';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital_id)->where('donation_sites.hospital_id',$hospital_id)->groupBy('serial_number','DESC')->findAll();
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);

		return view('donorsection/viewdonors',$data);
	}

	public function sitedonors($site,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		

		$data['title']= "ZNBTS DONOR'S DATA";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->groupBy('date_of_donation','DESC')->findAll();
		$data['userdata'] = session('logged_in', $user);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);

		return view('donorsection/viewsitedonors',$data);
	}

	public function datesitedonors($site=null,$day=null,$month=null,$year=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		 
		$date = $day.'/'.$month.'/'.$year;
		$user = session('logged_in', $user);

		$data['title']= "ZNBTS DONOR'S DATA";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->where('date_of_donation',$date)->groupBy('serial_number','DESC')->findAll();
		$data['userdata'] = session('logged_in', $user);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);
		$data['sites'] = $this->sites->getAllSites($user['hospital_id']);
		$data['date'] = $day.'-'.$month.'-'.$year;;

		return view('donorsection/datesiteview',$data);

	}

	public function donationsites($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		
		$data = [];

		$rules = [
			'donationsite' => 'required',
			  ];
		

			if ($this->request->getMethod() == "post") {

				if ($this->validate($rules)) {

					$donation_site_name = $this->request->getVar('donationsite');
					$hospital_id = $hospital_id;
						

			if ($this->sites->saveDonationsites($donation_site_name,$hospital_id) === true) {
				session()->setTempdata('Success','Donation Sites are added successfully', 3);
					return redirect()->to(base_url().'/addsites/'.$hospital_id);
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}

		$data['title']= 'Manage Donation Sites';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);

		return view('donorsection/donationsites',$data);
	}

	public function printdata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data['title']= "ZNBTS DONOR'S DATA";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id);
		$data['userdata'] = session('logged_in', $user);
		return view('donorsection/viewprint',$data);

			// echo view(var_dump($data['sitedata']));
	}
}


 ?>