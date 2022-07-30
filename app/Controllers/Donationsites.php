<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;


/**
 * 
 */
class Donationsites extends Controller
{
	public $alldonors;
	public $session;
	
	function __construct()
	{
		helper('form');
		$this->$alldonors = new GetAllDonors();
		$this->session = session();
	}

	public function index()
	{
		

		$data = [];
		$data['sites'] = $this->$alldonors->groupBy('site')->findAll();
		return view('donationsites',$data);
	}

	public function view($site=null)
	{
		$data['title']= 'Data from '.$site;
		$data['sitedata'] = $this->$alldonors->where('site',$site)->orderBy('date_of_next_donation')->findAll();
		return view('viewsite',$data);
	}

	public function viewprint($dateofnextd=null,$site=null)
	{

		$data['title']= 'DATA FROM '.$site;
		$data['sitedata'] = $this->$alldonors->where('date_of_next_donation',$dateofnextd)
											  ->where('site',$site)
											  ->findAll();
		return view('viewprint',$data);

			// echo view(var_dump($data['sitedata']));
	}



	
}


?>