<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FilesModel;


/**
 * 
 */
class Files extends Controller
{
	public $alldonorFiles;
	public $session;
	
	function __construct()
	{
		helper('form');
		$this->$alldonorFiles = new FilesModel();
		$this->session = session();
	}

	public function index()
	{

		if ($this->request->getMethod() == 'post') {

			
					$daterange = $this->request->getVar('daterange');
					$site = $this->request->getVar('site');
					$file = $this->request->getFile('file');

				if ($file->isValid() && !$file->hasMoved()) {
					$newname = $file->getRandomName();
					if ($file->move(FCPATH.'public/uploads',$newname)) {
						if ($this->$alldonorFiles->fileData($daterange,$site,$file->getName()) === true) {

							session()->setTempdata('Success','File record is added successfully', 3);
							return redirect()->to(current_url());
							
						}else{
							session()->setTempdata('Warning','Opps there was an error try again', 3);
							return redirect()->to(current_url());
						}
					}else{
						echo "<p>".$file->getErrorString()."</p>";
					}
				}

		}
		

		$data = [];
		$data['title'] = "Files";
		$data['file'] = $this->$alldonorFiles->getFiles();
		return view('viewfiles',$data);
	}

	
}


?>