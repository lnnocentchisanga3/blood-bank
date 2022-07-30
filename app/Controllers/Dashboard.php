<?php 
namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\Statistics;



/**
 * 
 */
class Dashboard extends BaseController
{
	public $adminModel;
	public $session;
	public $statistics1;

	function __construct()
	{
		helper('form');
		$this->adminModel = new AdminModels();
		$this->session = session();
		$this->statistics1 = new Statistics();
	}

	public function index()
	{
		$data = [];

		$data['hiv'] = $this->adminModel->hivNum();
		$data['hbv'] = $this->adminModel->hbvNum();
		$data['hcv'] = $this->adminModel->hcvNum();
		$data['syphilis'] = $this->adminModel->syphilisNum();
		$data['alldonors'] = $this->adminModel->getDonors();
		$data['statistics1'] = $this->statistics1->getStatistics1();
		$data['statistics'] = $this->statistics1->getStatistics();


		$data['title'] = "Dashboard | Admin";
		return view('admin/dashboard',$data);
	}
}


 ?>