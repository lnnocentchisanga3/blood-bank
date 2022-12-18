<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GetAllDonors;
use App\Models\DonationSitesModel;


/**
 * 
 */
class Listdonors extends Controller
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

	public function index($hospital=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		

		$data = [];
		$data['title'] = 'Donors form all the donation sites for all the Years';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		
		$data['donation_sites'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('site_id','DESC')->findAll();

		// $data['donation_dates'] = $this->sites->getUpcomingDates($hospital);

		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital);
		return view('listdonors',$data);
	}

	public function listdata($hospital=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];
		$data['title'] = 'List of all the donors';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		$data['userdata'] = session('logged_in');
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		return view('donordataclerk/listdonors',$data);
	}

	public function delete($id=null,$hospital_id=null){
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
		$donor = $this->alldonors->where('serial_number',$id)->findAll();

		if ($this->sites->deleteDonorRecord($id,$donor[0]->donor_id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdonors/'.$hospital_id);
		}
	}

	public function edit_donor($donation_id=null,$hospital_id1=null){

		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];

		if ($this->request->getMethod() === 'post') {

					// $donation_id = $donation_id;
					// $hospital_id1 = $hospital_id1;

					$hiv = $this->request->getVar('hiv',FILTER_SANITIZE_STRING);
					$hbv = $this->request->getVar('hbv',FILTER_SANITIZE_STRING);
					$hcv = $this->request->getVar('hcv',FILTER_SANITIZE_STRING);
					$syphilis = $this->request->getVar('syphilis',FILTER_SANITIZE_STRING);
					$comment = $this->request->getVar('comment',FILTER_SANITIZE_STRING);

				if ($this->sites->update_donation_details($donation_id,$hiv,$hbv,$hcv,$syphilis,$comment) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/edit_donor/'.$donation_id."/".$hospital_id1);
				}
		}
		$data['donor'] = $this->alldonors->join('donations','site_id')->where('donation_id',$donation_id)->findAll();
		// $data['sites'] = $this->sites->getAllSites($hospital_id1);
		$data['userdata'] = session('logged_in');

		return view('editdonordetials',$data);
	}

	public function edit_donor_one($id,$hospital_id){
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		// $data = [];
		$userdata = session('logged_in');
		$sites = $this->sites->getAllSites($hospital_id);
		$donor = $this->alldonors->join('donation_sites','site_id')->find($id);

		echo '<!-- Modal Header -->
          <div class="modal-header">
           <div class="row">
            <h4 class="col-md-12 text-center">Details of '.$donor->donor_fname.' '.$donor->donor_lname.' | Donor ID : '.$donor->donor_id.'</h4>
           </div>
           <h4 id="addAttrite"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

        <form action="'.base_url().'/Listdonors/edit_donor_data/'.$donor->serial_number.'/'.$donor->hospital_id.'" method="POST" id="pasteData">';

		echo '<div class="input-group col-md-12 my-4 container">
          <div class="row">
          <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor Personal Information</h4>
          <input type="text" name="donor_id" class="form-control" value="'.$donor->donor_id.'" hidden>

            <label class="px-2 my-2 col-md-2">Date of Birth</label>
         <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="date" name="dateofbirth" class="form-control" value="'.$donor->datebirth.'">
        <!-- </div> -->
        </div><br><br><br>
          <label class="px-2 my-2 col-md-2">Nationality</label>
          <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="text" name="nation" class="form-control" value="'.$donor->nationality.'">
        <!-- </div> -->
        </div>
          <input type="text" name="province" value="'.$userdata["province_id"].'" hidden>
          <input type="text" name="district" value="'.$userdata["district_id"].'" hidden>

          <label class="px-2 my-2 col-md-2">Donation Site</label>
           <div class="col-md-10">

            <select name="site" class="form-control my-2">';

      		if ($donor == null || $donor == ""){ 
              echo '<option>0 Sites Found</option>';
 
            	}else{
            echo '<option value="'.$donor->site_id.'">'.$donor->donation_site_name.'</option>';
            
	            foreach ($sites as $row) {
	            	if ($donor->donation_site_name == $row['donation_site_name']) {
	            		
	            	} else {
	            		echo '<option value="'.$row["site_id"].'">'.$row["donation_site_name"].'</option>';
	            	}
	            	
	            }

            	} 
          echo'</select>

           </div>

          </div>
         </div>
        
         <div class="input-group col-md-12 my-4 container">
          <div class="row">

        <label class="px-2 my-2 col-md-2">Firstname</label>
         <div class="col-md-10">
           <input type="text" class="form-control" placeholder="Donor Firstame" name="fnames" value="'.$donor->donor_fname.'">
         </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Middlename</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Middlename" name="mnames" value="'.$donor->donor_mname.'">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Lastname</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Lastname" name="lastname" value="'.$donor->donor_lname.'">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Gender<small>(Female,Male)</small></label>
        <div class="col-md-10">
          <select class="form-control" name="gender" >
              <option>'.$donor->gender.'</option>
              <option>Male</option>
              <option>female</option>
            </select>
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Blood_Group</label>
         <div class="col-md-10">
         <select class="form-control" name="group">
              <option>'.$donor->blood_group.'</option>
              <option>A</option>
              <option>B</option>
              <option>O</option>
              <option>A+</option>
              <option>A-</option>
              <option>O+</option>
              <option>O-</option>
            </select>
          </div><br><br><br>

<h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor Contact Information</h4>

				<label class="px-2 my-2 col-md-2">Residential Address</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Sample ID" name="address" value="'.$donor->residentialAddress.'" >
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Email</label>
        <div class="col-md-10">
        <select class="form-control" name="email" >
              <option>'.$donor->email.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Phone</label>
        <div class="col-md-10">
        <select class="form-control" name="phone">
              <option>'.$donor->phone.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

          <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donation Status</h4>

        <label class="px-2 my-2 col-md-2">Donation Status <br><small><span class="bg-success text-white py-1 px-1">Can Donate</span><br> <span class="bg-danger text-white py-1 px-1">Can Not Donate</span></small></label>
         <div class="col-md-10">
         <select class="form-control" name="d_status">
              <option>'.$donor->donation_status.'</option>
              <option value="Can Donate">Can Donate</option>
              <option value="Can Not Donate">Can Not Donate</option>
            </select>
          </div><br><br><br>

        <div class="box-footer" >
        <input type="submit"  value="Save Changes" name="submit" class="btn btn-primary btn-rounded my-3">
        </div>
      </div>
    </div>
    </form>
    ';


    

	}

	public function donor_print($donor_id=null)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data['userdata'] = session('logged_in');
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->where("donor_id",$donor_id)->findAll();

		$data['donationhistory'] = $this->sites->getDonationHistory($donor_id);

		$data['title'] = $donor_id;

		return view("donor_print",$data);
	}

	public function delete_data($id=null,$hospital_id=null){
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		if ($this->sites->deleteDonorRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdata/'.$hospital_id);
		}
	}

	public function delete_donation_record($id=null,$site_id=null,$hospital_id=null){
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		if ($this->sites->deleteDonationRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url()."/viewdonationsite/".$site_id."/".$hospital_id);
		}
	}

	public function edit_donor_data($serial_number=null,$hospital_id=null){

		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}

		$data = [];

		if ($this->request->getMethod() === 'post') {

					$donor_id = $this->request->getVar('donor_id',FILTER_SANITIZE_STRING);
					$donor_fname = $this->request->getVar('fnames',FILTER_SANITIZE_STRING);
					$donor_mname = $this->request->getVar('mnames',FILTER_SANITIZE_STRING);
					$donor_lname = $this->request->getVar('lastname',FILTER_SANITIZE_STRING);
					$dob = $this->request->getVar('dateofbirth',FILTER_SANITIZE_STRING);
					$nation = $this->request->getVar('nation',FILTER_SANITIZE_STRING);
					$gender = $this->request->getVar('gender',FILTER_SANITIZE_STRING);
					$address = $this->request->getVar('address',FILTER_SANITIZE_STRING);
					$email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
					$phone = $this->request->getVar('phone',FILTER_SANITIZE_STRING);
					$site = $this->request->getVar('site',FILTER_SANITIZE_STRING);
					$d_status = $this->request->getVar('d_status',FILTER_SANITIZE_STRING);
					$group = $this->request->getVar('group',FILTER_SANITIZE_STRING);

					// echo "Last name : ".$donor_lname."<br>";
					// echo "Date of Birth : ".$dob;

				if ($this->sites->update_donor($serial_number,$donor_fname,$donor_mname,$donor_lname,$dob,$nation,$gender,$address,$email,$phone,$site,$d_status,$group) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/listdonors/'.$hospital_id);
				}
		}
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->find($id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in');

		return view('donordataclerk/editdonordetials',$data);
	}
}


