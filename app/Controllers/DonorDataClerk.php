<?php 
namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\Statistics;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;



/**
 * 
 */
class DonorDataClerk extends BaseController
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
		


		$data['title'] = "Dashboard | Donor Data Clerk";
		return view('donordataclerk/index',$data);
	}
}


 ?>