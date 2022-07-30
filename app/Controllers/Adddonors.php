<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\AddDonorsModel;


/**
 * 
 */
class Adddonors extends Controller
{
	public $saveDonorsModel;
	public $session;
	
	function __construct()
	{
		helper('form');
		/*$this->$alldonors = new GetAllDonors();*/
		$this->saveDonorsModel = new AddDonorsModel();
		$this->session = session();
	}

	public function index()
	{
		
		$data = [];
		$rules = [
			/*'sampleid[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'Sample id fields are required to be filled in'
				],
			],
			'names[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'Donor Names are required to be filled in'
				],
			],
			'hiv[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'HIV fields are required to be filled in'
				],
			],
			'hbv[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'HBV fields are required to be filled in'
				],
			],
			'hcv[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'HCV fields are required to be filled in'
				],
			],
			'syphilis[]' => [
				'rules'=>'required',
				'errors'=>[
					'required'=>'Syphilis fields are required to be filled in'
				],
			],
			'comment[]' =>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'Comment fields are required to be filled in'
				],
			],*/
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

				if ($this->validate($rules)) {

				/*$data = [
					'sampleid' => $this->request->getVar('sampleid'),
					'names' => $this->request->getVar('names'),
					'hiv' => $this->request->getVar('hiv'),
					'hbv' => $this->request->getVar('hbv'),
					'hcv' => $this->request->getVar('hcv'),
					'syphilis' => $this->request->getVar('syphilis'),
					'comment' => $this->request->getVar('comment'),
					'dod' => $this->request->getVar('dod'),
					'donextd' => $this->request->getVar('donextd'),
					'site' => $this->request->getVar('site')
				];

				if ($this->saveDonorsModel->save($data) === true) {
					session()->setTempdata('Success','Donors are added successfully', 3);
					return redirect()->to(current_url());
				}*/

					$sample_id = $this->request->getVar('sampleid');
					$donor_name = $this->request->getVar('names');
					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = $this->request->getVar('dod');
					$date_of_next_donation = $this->request->getVar('donextd');
					$site = $this->request->getVar('site');
						
				

			if ($this->saveDonorsModel->saveDonors($sample_id,$donor_name,$hiv,$hbv,$hcv,$syphilis,$comment,$date_of_donation,$date_of_next_donation,$site) === true) {
				session()->setTempdata('Success','Donors are added successfully', 3);
					return redirect()->to(current_url());
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}
		
		return view('adddonors',$data);
	}
}


?>