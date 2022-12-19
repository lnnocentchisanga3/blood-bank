<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;


/**
 * 
 */
class Donationsites extends Controller
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

	public function index($hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		

		$data = [];
		$data['sites'] = $this->alldonors->where('hospital_id',$hospital_id)->groupBy('site_id','ASC')->findAll();
		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);

		return view('donationsites',$data);
	}

	public function view($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$data['title']= "Blood Donation Report on Donation Site _____________________________";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['siteview'] = $this->alldonors
							->join('donation_sites','site_id')
							->join('donations','site_id')
							->where('donors.site_id',$site)
							->groupBy('date_of_donation','DESC')->findAll();

		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['site_id'] = $site;

		return view('viewsite',$data);
	}

	public function viewsitedate($site=null,$date1=null,$date2=null,$date3=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$dateod = $date1."/".$date2."/".$date3;
		$dat = $date1."-".$date2."-".$date3;
		$dateod1 = str_replace("//","",$dat);

		$user = session('logged_in');
		$data['title']= "Blood Donation Report On ".str_replace("//", "",$dateod)." Donation Site _____________________________";
		$data['sitedata'] = $this->alldonors
							->join('donation_sites','site_id')
							->join('donations','site_id')
							->where('donors.site_id',$site)
							->where('donations.date_of_donation',str_replace("//","",$dateod))
							->groupBy('date_of_donation','DESC')->findAll();

		$data['siteview'] = $this->alldonors
							->join('donation_sites','site_id')
							->join('donations','site_id')
							->where('donors.site_id',$site)
							->groupBy('date_of_donation','DESC')->findAll();

		$data['sitedata1'] = $this->alldonors
							->join('donation_sites','site_id')
							->join('donations','site_id')
							->where('donors.site_id',$site)
							->where('date_of_donation',str_replace("--","",$dateod1))
							->groupBy('donors.donor_id','DESC')->findAll();

		$data['userdata'] = session('logged_in');
		$data['para'] = $dateod;
		$data['para1'] = $dateod1;
		$data['sites'] = $this->sites->getAllSites($user['hospital_id']);

		return view('viewdatesite',$data);
	}

	public function viewdata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$data['title']= "Blood Donation Report on Donation Site _____________________________";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['sites'] = $this->sites->getAllSites($hospital_id);

		$data['userdata'] = session('logged_in');
		return view('donordataclerk/viewsite',$data);
	}

	public function deleteSite($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		if ($this->sites->deletesite($site)) {
			session()->setTempdata('Success','Donation site is been Deleted', 3);
				return redirect()->to(base_url().'/addsites/'.$hospital_id);
		}else{
			session()->setTempdata('error','Opps Something went wrong try again', 3);
				return redirect()->to(base_url().'/addsites/'.$hospital_id);
		}
	}

	public function deleteSitedata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		if ($this->sites->deletesite($site)) {
			session()->setTempdata('Success','Donation site is been Deleted', 3);
				return redirect()->to(base_url().'/managedonationsites/'.$hospital_id);
		}else{
			session()->setTempdata('error','Opps Something went wrong try again', 3);
				return redirect()->to(base_url().'/managedonationsites/'.$hospital_id);
		}
	}

	public function editSite($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		if ($this->request->getMethod() == "post") {

					
					$sitedata = $this->request->getVar('site',FILTER_SANITIZE_STRING);
						

			if ($this->sites->editsite($site,$sitedata)) {
				session()->setTempdata('Success','Donation site is been updated', 3);
					return redirect()->to(base_url().'/addsites/'.$hospital_id);
			}else{
				session()->setTempdata('error','Opps Something went wrong try again', 3);
					return redirect()->to(base_url().'/addsites/'.$hospital_id);
			}

		}
		

		$data['title']= "ZNBTS DONOR'S DATA";
		$data['site'] = $this->sites->getSite($site);
		$data['sites'] = $this->sites->getAllSites($hospital_id);


		$data['userdata'] = session('logged_in');
		return view('editsitedetails',$data);
	}

	public function editSitedata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		if ($this->request->getMethod() == "post") {

					
					$sitedata = $this->request->getVar('site',FILTER_SANITIZE_STRING);
						

			if ($this->sites->editsite($site,$sitedata)) {
				session()->setTempdata('Success','Donation site is been updated', 3);
					return redirect()->to(base_url().'/managedonationsites/'.$hospital_id);
			}else{
				session()->setTempdata('error','Opps Something went wrong try again', 3);
					return redirect()->to(base_url().'/managedonationsites/'.$hospital_id);
			}

		}
		

		$data['title']= "ZNBTS DONOR'S DATA";
		$data['site'] = $this->sites->getSite($site);

		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);

		return view('donordataclerk/editsitedetails',$data);
	}

	public function sitedata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data['title']= "Blood Donation Report on Donation Site _____________________________";
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);

		return view('viewprint',$data);

			// echo view(var_dump($data['sitedata']));
	}

	public function viewprintadata($site=null,$hospital_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data['title']= "Blood Donation Report on Donation Site _____________________________";
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		
		$data['sitedata'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['userdata'] = session('logged_in');
		return view('donordataclerk/viewprint',$data);

			// echo view(var_dump($data['sitedata']));
	}


	public function oneSiteViewList($hospital_id=null,$site=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data['title']= "Blood Donation Report on Donation Site _____________________________";
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['site_id'] = $site;
		
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')
											  ->where('donors.site_id',$site)->findAll();
		$data['userdata'] = session('logged_in');
		return view('donordataclerk/viewprint',$data);

			// echo view(var_dump($data['sitedata']));
	}



	
}


?>