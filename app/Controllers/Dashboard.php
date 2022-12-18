<?php 
namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\Statistics;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;



/**
 * 
 */
class Dashboard extends BaseController
{
	public $adminModel;
	public $session;
	public $statistics1;
	public $alldonors;
	public $sites;

	function __construct()
	{
		helper('form');
		$this->adminModel = new AdminModels();
		$this->alldonors = new GetAllDonors();
		$this->session = session();
		$this->statistics1 = new Statistics();
		$this->sites = new DonationSitesModel();
	}

	public function index($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		
		$data = [];
		$data['hospital'] = $this->sites->getAHospital($hospital_id);
		$data['donors'] = $this->alldonors->where('hospital_id',$hospital_id)->groupBy('serial_number','DESC')->findAll();

		$data['donorsAllDb'] = $this->alldonors->join('hospital','hospital_id')->join('donation_sites','site_id')->groupBy('serial_number','DESC')->findAll();

		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');
		


		$data['title'] = "Dashboard | Admin";
		return view('admin/dashboard',$data);
	}


	public function upcoming($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		
		$data = [];
		$data['title'] = "Upcoming Donation Dates";
		$data['userdata'] = session('logged_in');
		$data['alldonors'] = $this->adminModel->getDonors($hospital_id);
		return view('upcoming',$data);
	}

	public function searchreport($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$data = [];

		if ($this->request->getMethod() == "post") {

			$site = $this->request->getVar('site');
			$fromdate = str_replace("-","/",$this->request->getVar('fromdate'));
			$todate = str_replace("-", "/", $this->request->getVar('todate'));

			$site_name = $this->sites->getSite($site);

			$getData = $this->sites->getareport($site,$fromdate,$todate,$hospital_id);

			if ($getData != null) {
				$data['dataSearched'] = $getData;
				$data['tests'] = "Data Report from ".$site_name[0]->donation_site_name." From ".$fromdate." To ".$todate;
				$data['title'] = "Data Report from ".$site_name[0]->donation_site_name." From ".$fromdate." To ".$todate;
				
				$data['userdata'] = session('logged_in');
				$data['sites'] = $this->sites->getAllSites($hospital_id);

				return view('reports',$data);
			}else{
				$data['title'] = "Data Report from ".$site_name[0]->donation_site_name." From ".$fromdate." To ".$todate;
				$data['dataSearched'] = null;
				$data['tests'] = $site." ".$fromdate." ".$todate;
				$data['userdata'] = session('logged_in');
				$data['sites'] = $this->sites->getAllSites($hospital_id);

				return view('reports',$data);
			}


		}
	}

	public function reports($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		
		$data = [];
		$data['title'] = "Data Reports";
		$data['userdata'] = session('logged_in');
		$data['dataSearched'] = null;
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['alldonors'] = $this->adminModel->getDonors($hospital_id);
		return view('reports',$data);
	}

	public function statisticsdata($hospital_id=null,$year=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		
		$data = [];
		$data['year_added'] = $year;
		$data['statistics1'] = $this->statistics1->getStatistics1($hospital_id,$year);
		$data['statistics'] = $this->statistics1->getStatistics($hospital_id,$year);
		$data['donors'] = $this->alldonors
				->join('donations','site_id')
				->join('donation_sites','site_id')
				->where('donors.hospital_id',$hospital_id)
				->where('donation_sites.hospital_id',$hospital_id)
				->like('date_of_donation',$year)
				->groupBy('serial_number','DESC')->findAll();

		$data['hiv'] = $this->adminModel->hivNum($hospital_id,$year);
		$data['hbv'] = $this->adminModel->hbvNum($hospital_id,$year);
		$data['hcv'] = $this->adminModel->hcvNum($hospital_id,$year);
		$data['syphilis'] = $this->adminModel->syphilisNum($hospital_id,$year);
		$data['Discards'] = $this->adminModel->Discards($hospital_id,$year);
		
		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['title'] ="Statistics for the Year ".$year;
		$data['alldonors'] = $this->adminModel->getDonors($hospital_id);
		return view('statistics',$data);
	}

	

	public function addsites($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];

		$rules = [
			'donationsite' => [
				'rules' => 'required',
				'errors'=> [
					'required' => 'Donation Site Name input field cannot be empty',
				],
			],
			  ];
		

			if ($this->request->getMethod() == "post") {

				if ($this->validate($rules)) {

					$donation_site_name = $this->request->getVar('donationsite');
					$hospital_id = $hospital_id;
						

			if ($this->sites->saveDonationsites($donation_site_name,$hospital_id) === true) {
				session()->setTempdata('Success','Donation Site is added successfully', 3);
					return redirect()->to(base_url().'/addsites/'.$hospital_id);
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}

		$data['title']= 'Manage Donation Sites';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');

		return view('adddonationsite',$data);
	}



	public function managedonationsites($hospital_id=null)
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

					$donation_site_name = $this->request->getVar('donationsite',FILTER_SANITIZE_STRING);
					$hospital_id = $hospital_id;
						

			if ($this->sites->saveDonationsites($donation_site_name,$hospital_id) === true) {
				session()->setTempdata('Success','Donation Sites are added successfully', 3);
					return redirect()->to(base_url().'/managedonationsites/'.$hospital_id);
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}

		$data['title']= 'Manage Donation Sites';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');

		return view('donordataclerk/managedonationsites',$data);
	}
}


 ?>