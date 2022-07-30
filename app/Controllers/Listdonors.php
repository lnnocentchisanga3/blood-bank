<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;


/**
 * 
 */
class Listdonors extends Controller
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
		$data['alldonors'] = $this->$alldonors->findAll();
		return view('listdonors',$data);
	}

	public function delete($id=null){
		if ($this->$alldonors->where('serial_number',$id)->delete()) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdonors');
		}
	}

	public function edit($id=null){

		if ($this->request->getMethod() === 'post') {
			$data = [
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

				if ($this->$alldonors->update($id,$data) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(current_url());
				}
		}

		return view('editdonordetials',['donor'=>$this->$alldonors->find($id)]);
	}
}


?>