<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\AddDonorsModel;
use App\Models\DonationSitesModel;


/**
 * 
 */
class Adddonors extends Controller
{
	public $saveDonorsModel;
	public $session;
	public $sites;
	
	function __construct()
	{
		helper('form');
		$this->alldonors = new GetAllDonors();
		$this->saveDonorsModel = new AddDonorsModel();
		$this->session = session();
		$this->sites = new DonationSitesModel();
	}

	public function index($hospital_id=null,$site_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$getuser = session('logged_in');
		$rules = [
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

					$sample_id = $this->request->getVar('sampleid',FILTER_SANITIZE_STRING);
					$date_of_donation = $this->request->getVar('dod',FILTER_SANITIZE_STRING);
					$date_of_next_donation = $this->request->getVar('donextd',FILTER_SANITIZE_STRING);
					$site = $site_id;
					$donor_id = $this->request->getVar('donor_id',FILTER_SANITIZE_STRING);

					$dateod = str_replace("-","/",$date_of_donation);
					$donextd = str_replace("-","/",$date_of_next_donation);
						
				

			if ($this->sites->checkDonation($sample_id) == true) {
				session()->setTempdata('error','This Donation Sample ID Already exists in the Database', 3);
					return redirect()->to(base_url()."/adddonors/".$hospital_id."/".$site_id);
			}else{
				if ($this->saveDonorsModel->saveDonors($sample_id,$donor_id,$dateod,$donextd,$site) === true) {
				session()->setTempdata('Success','Donation Details are added successfully', 3);
					return redirect()->to(base_url()."/adddonors/".$hospital_id."/".$site_id);
			}else{
				session()->setTempdata('error','An error occured', 3);
					return redirect()->to(base_url()."/adddonors/".$hospital_id."/".$site_id);
			}
			}
			

		}
		$data['title'] = 'Adding a Donors';
		$data['sites'] = $this->sites->getSite($site_id);
		$data['donors'] = $this->alldonors->where('site_id',$site_id)->findAll();
		$data['userdata'] = session('logged_in');
		$data['site_id'] = $site_id;
		return view('adddonors',$data);
	}


	public function dataentry($hospital_id)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		
		$data = [];
		$getuser = session('logged_in');
		$rules = [
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
			  ];
		

			if ($this->request->getMethod() == "post") {

				if ($this->validate($rules)) {

					$sample_id = $this->request->getVar('sampleid',FILTER_SANITIZE_STRING);
					$donor_fname = $this->request->getVar('fnames',FILTER_SANITIZE_STRING);
					$donor_mname = $this->request->getVar('mnames',FILTER_SANITIZE_STRING);
					$donor_lname = $this->request->getVar('lnames',FILTER_SANITIZE_STRING);
					$hiv = $this->request->getVar('hiv',FILTER_SANITIZE_STRING);
					$hbv = $this->request->getVar('hbv',FILTER_SANITIZE_STRING);
					$hcv = $this->request->getVar('hcv',FILTER_SANITIZE_STRING);
					$syphilis = $this->request->getVar('syphilis',FILTER_SANITIZE_STRING);
					$comment = $this->request->getVar('comment',FILTER_SANITIZE_STRING);
					$date_of_donation = $this->request->getVar('dod',FILTER_SANITIZE_STRING);
					$date_of_next_donation = $this->request->getVar('donextd',FILTER_SANITIZE_STRING);
					$site = $this->request->getVar('site',FILTER_SANITIZE_STRING);
					$group = $this->request->getVar('group',FILTER_SANITIZE_STRING);
					$district_id = $this->request->getVar('district',FILTER_SANITIZE_STRING);
					$province_id = $this->request->getVar('province',FILTER_SANITIZE_STRING);

					$dateod = str_replace("-","/",$date_of_donation);
					$dateod1 = str_replace("-","/",$date_of_next_donation);
						
				

			if ($this->saveDonorsModel->saveDonors($sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$datedo,$datedo1,$site,$hospital_id,$province_id,$district_id) === true) {
				session()->setTempdata('Success','Donors are added successfully', 3);
					return redirect()->to(base_url().'/dataentry/'.$hospital_id);
			}
			/*var_dump($status);*/

			}else{
			$data['validation'] = $this->validator;
		}

		}
		$data['title'] = 'Adding a Donors';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');
		return view('donordataclerk/adddonors',$data);
	}


	public function oneAdddonor($hospital_id=null,$site_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$getuser = session('logged_in');
		// $rules = [
		// 	'dod' => 'required',
		// 	'donextd' => 'required',
		// 	'site' => 'required',
		// 	'sampleid' => 'required',
		// 	'fnames' => 'required',
		// 	'mnames' => 'required',
		// 	'lnames' => 'required',
		// 	'dateob' => 'required',
		// 	''

		// 	  ];
		

			if ($this->request->getMethod() == "post") {

				// if ($this->validate($rules)) {

					$marital = $this->request->getVar('marital',FILTER_SANITIZE_STRING);
					$nrc = $this->request->getVar('nrc',FILTER_SANITIZE_STRING);
					$national = $this->request->getVar('nation',FILTER_SANITIZE_STRING);

					$donor_fname = $this->request->getVar('fname',FILTER_SANITIZE_STRING);
					$donor_mname = $this->request->getVar('mname',FILTER_SANITIZE_STRING);
					$donor_lname = $this->request->getVar('lname',FILTER_SANITIZE_STRING);

					$day_get = $this->request->getVar('day',FILTER_SANITIZE_STRING);
					$month_get = $this->request->getVar('month',FILTER_SANITIZE_STRING);
					$year_get = $this->request->getVar('year',FILTER_SANITIZE_STRING);

					$dateob = $year_get."-".$month_get."-".$day_get;
					
					$gender = $this->request->getVar('gender',FILTER_SANITIZE_STRING);
					$occupation = $this->request->getVar('occupation',FILTER_SANITIZE_STRING);
					$site = $this->request->getVar('site',FILTER_SANITIZE_STRING);


					$doldon = $this->request->getVar('doldon',FILTER_SANITIZE_STRING);
					$sod = $this->request->getVar('sod',FILTER_SANITIZE_STRING);
					$group = $this->request->getVar('group',FILTER_SANITIZE_STRING);
					$numofdonation = $this->request->getVar('numofdonation',FILTER_SANITIZE_STRING);


					$postaladdress = $this->request->getVar('postaladdress',FILTER_SANITIZE_STRING);
					$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
					$phone = $this->request->getVar('phone',FILTER_SANITIZE_STRING);
					$district_id = $this->request->getVar('district',FILTER_SANITIZE_STRING);
					$province_id = $this->request->getVar('province',FILTER_SANITIZE_STRING);
					$donor_id = $this->uniqueDonorNumber($hospital_id,$site,substr(date('Y'), 2));
					

					// $hiv = $this->request->getVar('hiv',FILTER_SANITIZE_STRING);
					// $hbv = $this->request->getVar('hbv',FILTER_SANITIZE_STRING);
					// $hcv = $this->request->getVar('hcv',FILTER_SANITIZE_STRING);
					// $syphilis = $this->request->getVar('syphilis',FILTER_SANITIZE_STRING);
					// $comment = $this->request->getVar('comment',FILTER_SANITIZE_STRING);
					// $date_of_donation = date('Y/m/d',FILTER_SANITIZE_STRING);
					// $date_of_next_donation = str_replace("-","/",$this->request->getVar('donextd'));
					
					
						
				

			if ($this->saveDonorsModel->saveDonorOne($donor_id,$donor_fname,$donor_mname,$donor_lname,$marital,$national,$nrc,$group,$site,$hospital_id,$province_id,$district_id,$dateob,$gender,$occupation,$doldon,$sod,$postaladdress,$email,$phone,$numofdonation) === true) {
				session()->setTempdata('Success','Donor Record has been added successfully and the Donor ID is : '.$donor_id, 3);
					return redirect()->to(base_url()."/oneAdddonor/".$hospital_id."/".$site);
			}else{
				session()->setTempdata('Success','Error occured while saving the Record', 3);
					return redirect()->to(base_url()."/oneAdddonor/".$hospital_id."/".$site);
			}

					// $donor_id = $this->uniqueDonorNumber($hospital_id,$site,substr(date('Y'), 2));
					// session()->setTempdata('Success','Donor id is : '.$donor_id, 3);
					// return redirect()->to(base_url()."/oneAdddonor/".$hospital_id);
			/*var_dump($status);*/

		// 	}else{
		// 	$data['validation'] = $this->validator;
		// }

		}
		$data['title'] = 'Adding Donor Details';
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');
		$data['site_id'] = $site_id;
		return view('oneDonorAdd',$data);
	}


	private function uniqueDonorNumber($hospital,$site,$year)
	{
		$storage = array();
		$hospital_id = 

        $looping_number = 5999;
        $randomToken = 2155141310824567196;

        while ($looping_number > 0) {
            $shuffle_nums = str_shuffle($randomToken);
            $finalRandomToken = substr($shuffle_nums, 0,6);
            array_push($storage, $finalRandomToken);
            array_unique($storage);

            $looping_number --;
        }

        /*Testing Code to find the Match*/

      // if (in_array($finalRandomToken, $storage))
      //     {
      //     echo "Match found for : ".$finalRandomToken."<br>";
      //     }
      //   else
      //     {
      //     echo "Match not found : ".$finalRandomToken."<br>";
      //     }
	  //print_r(array_unique($storage))."<br>";

        /*End of Testing Code*/

         $donor_id = $hospital.$site.$year.$storage[0];

          return $donor_id;
	}
}


?>