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
		

		$data = [];
		$data['title'] = 'Donors form all the donation sites for all the Years';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		
		$data['donation_sites'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('site_id','DESC')->findAll();

		$data['donation_dates'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('date_of_donation','DESC')->findAll();

		$data['userdata'] = session('logged_in', $user);
		$data['sites'] = $this->sites->getAllSites($hospital);
		return view('listdonors',$data);
	}

	public function listdata($hospital=null)
	{
		

		$data = [];
		$data['title'] = 'List of all the donors';
		$data['donors'] = $this->alldonors->join('donation_sites','site_id')->where('donors.hospital_id',$hospital)->where('donation_sites.hospital_id',$hospital)->groupBy('serial_number','DESC')->findAll();
		$data['userdata'] = session('logged_in', $user);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		return view('donordataclerk/listdonors',$data);
	}

	public function delete($id=null,$hospital_id=null){
		if ($this->sites->deleteDonorRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdonors/'.$hospital_id);
		}
	}

	public function edit_donor($id=null,$hospital_id1=null){

		$data = [];

		if ($this->request->getMethod() === 'post') {
			// $donor_data = [
			// 		'sample_id' => $this->request->getVar('sampleid'),
			// 		'donor_fname' => $this->request->getVar('names'),
			// 		'donor_mname' => $this->request->getVar('names'),
			// 		'donor_lname' => $this->request->getVar('names'),
			// 		'hiv' => $this->request->getVar('hiv'),
			// 		'hbv' => $this->request->getVar('hbv'),
			// 		'hcv' => $this->request->getVar('hcv'),
			// 		'syphilis' => $this->request->getVar('syphilis'),
			// 		'comment' => $this->request->getVar('comment'),
			// 		'date_of_donation' => $this->request->getVar('dod'),
			// 		'date_of_next_donation' => $this->request->getVar('donextd'),
			// 		'site_id' => $this->request->getVar('site'),
			// 		'hospital_id' => $hospital_id,
			// 		'district_id' => $this->request->getVar('district'),
			// 		'province_id' => $this->request->getVar('province'),
			// 	];

					$sample_id = $this->request->getVar('sampleid');
					$donor_fname = $this->request->getVar('fnames');
					$donor_mname = $this->request->getVar('mnames');
					$donor_lname = $this->request->getVar('lnames');
					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = $this->request->getVar('dod');
					$date_of_next_donation = $this->request->getVar('donextd');
					$site = $this->request->getVar('site');
					$hospital_id = $hospital_id1;
					$district_id = $this->request->getVar('district');
					$group = $this->request->getVar('group');
					$province_id = $this->request->getVar('province');

				if ($this->sites->update_donor($id,$sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$comment,$date_of_donation,$date_of_next_donation,$site,$hospital_id,$province_id,$district_id,$group) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/listdonors/'.$hospital_id1);
				}
		}
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->find($id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);

		return view('editdonordetials',$data);
	}

	public function edit_donor_one($id,$hospital_id){

		// $data = [];
		$userdata = session('logged_in', $user);
		$sites = $this->sites->getAllSites($hospital_id);
		$donor = $this->alldonors->join('donation_sites','site_id')->find($id);

		echo '<!-- Modal Header -->
          <div class="modal-header">
           <div class="row">
            <h4 class="col-md-12 text-center">Editing '.$donor->donor_fname.' '.$donor->donor_lname.' | Sample ID : '.$donor->sample_id.'</h4>
           </div>
           <h4 id="addAttrite"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

        <form action="'.base_url().'/Listdonors/edit_donor/'.$donor->serial_number.'/'.$donor->hospital_id.'" method="POST" id="pasteData">';

		echo '<div class="input-group col-md-12 my-4 container">
          <div class="row">
            <label class="px-2 my-2 col-md-2">Date of Donation</label>
         <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="text" name="dod" class="form-control" value="'.$donor->date_of_donation.'">
        <!-- </div> -->
        </div><br><br><br>
          <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
          <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="text" name="donextd" class="form-control" value="'.$donor->date_of_next_donation.'">
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

        <label class="px-2 my-2 col-md-2">Sample_ID</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Sample ID" name="sampleid" value="'.$donor->sample_id.'" >
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Firstnames</label>
         <div class="col-md-10">
           <input type="text" class="form-control" placeholder="Donor Firstame" name="fnames" value="'.$donor->donor_fname.'">
         </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Middlenames</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Middlename" name="mnames" value="'.$donor->donor_mname.'">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Lastnames</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Lastname" name="lnames" value="'.$donor->donor_lname.'">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">HIV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
          <select class="form-control" name="hiv" >
              <option>'.$donor->hiv.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
        </div><br><br><br>


        <label class="px-2 my-2 col-md-2">HBV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
        <select class="form-control" name="hbv" >
              <option>'.$donor->hbv.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">HCV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
        <select class="form-control" name="hcv">
              <option>'.$donor->hcv.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Syphilis<small>(1,2,22,R)</small></label>
         <div class="col-md-10">
         <select class="form-control" name="syphilis">
              <option>'.$donor->syphilis.'</option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
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

        <label class="px-2 my-2 col-md-2">Status_Comment</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Comment" name="comment" value="'.$donor->comment.'">
        </div><br><br><br>

        <div class="box-footer" >
        <input type="submit"  value="Save Changes" name="submit" class="btn btn-primary btn-rounded my-3">
        </div>
      </div>
    </div>
    </form>
    ';


    

	}

	public function delete_data($id=null,$hospital_id=null){
		if ($this->sites->deleteDonorRecord($id)) {
			session()->setTempdata('Success','Donor record has been Deleted Successfully', 3);
			return redirect()->to(base_url().'/listdata/'.$hospital_id);
		}
	}

	public function edit_donor_data($id=null,$hospital_id=null){

		$data = [];

		if ($this->request->getMethod() === 'post') {
			// $donor_data = [
			// 		'sample_id' => $this->request->getVar('sampleid'),
			// 		'donor_fname' => $this->request->getVar('names'),
			// 		'donor_mname' => $this->request->getVar('names'),
			// 		'donor_lname' => $this->request->getVar('names'),
			// 		'hiv' => $this->request->getVar('hiv'),
			// 		'hbv' => $this->request->getVar('hbv'),
			// 		'hcv' => $this->request->getVar('hcv'),
			// 		'syphilis' => $this->request->getVar('syphilis'),
			// 		'comment' => $this->request->getVar('comment'),
			// 		'date_of_donation' => $this->request->getVar('dod'),
			// 		'date_of_next_donation' => $this->request->getVar('donextd'),
			// 		'site_id' => $this->request->getVar('site'),
			// 		'hospital_id' => $hospital_id,
			// 		'district_id' => $this->request->getVar('district'),
			// 		'province_id' => $this->request->getVar('province'),
			// 	];

					$sample_id = $this->request->getVar('sampleid');
					$donor_fname = $this->request->getVar('fnames');
					$donor_mname = $this->request->getVar('mnames');
					$donor_lname = $this->request->getVar('lnames');
					$hiv = $this->request->getVar('hiv');
					$hbv = $this->request->getVar('hbv');
					$hcv = $this->request->getVar('hcv');
					$syphilis = $this->request->getVar('syphilis');
					$comment = $this->request->getVar('comment');
					$date_of_donation = $this->request->getVar('dod');
					$date_of_next_donation = $this->request->getVar('donextd');
					$site = $this->request->getVar('site');
					$hospital_id = $hospital_id;
					$district_id = $this->request->getVar('district');
					$group = $this->request->getVar('group');
					$province_id = $this->request->getVar('province');

				if ($this->sites->update_donor($id,$sample_id,$donor_fname,$donor_mname,$donor_lname,$hiv,$hbv,$hcv,$syphilis,$comment,$date_of_donation,$date_of_next_donation,$site,$hospital_id,$province_id,$district_id,$group) === true) {
					session()->setTempdata('Success',"Donor's record has been updated successfully", 3);
					return redirect()->to(base_url().'/listdata/'.$hospital_id);
				}
		}
		$data['donor'] = $this->alldonors->join('donation_sites','site_id')->find($id);
		$data['sites'] = $this->sites->getAllSites($hospital_id);
		$data['userdata'] = session('logged_in', $user);

		return view('donordataclerk/editdonordetials',$data);
	}
}


