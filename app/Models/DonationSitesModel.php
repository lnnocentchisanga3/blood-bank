<?php
namespace App\Models;
use CodeIgniter\Model;


/**
 * 
 */
class DonationSitesModel extends Model
{
	public $db;
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function getAllSites($hospital_id)
	{
		$builder = $this->db->table('donation_sites');
		$builder->where('hospital_id',$hospital_id);
		$builder->select("*");
		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return $hospital_id;
			}else{
				return $result->getResultArray();
			}
		}else{
			return false;
		}
	}

	public function getDonationHistory($donor_id)
	{
		$builder = $this->db->table('donations');
		$builder->select("*");
		$builder->where('donor_id',$donor_id);
		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return $hospital_id;
			}else{
				return $result->getResultObject();
			}
		}else{
			return false;
		}
	}

	public function checkDonation($sample_id)
	{
		$builder = $this->db->table('donations');
		$builder->select("*");
		$builder->where('sample_id',$sample_id);
		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}


	public function getAHospital($hospital_id)
	{
		$builder = $this->db->table('hospital');
		$builder->where('hospital_id',$hospital_id);
		$builder->select("*");
		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return $result->getResultArray();
			}
		}else{
			return false;
		}
	}

	public function getSite($id)
	{
		$builder = $this->db->table('donation_sites');
		$builder->where('site_id',$id);
		$builder->select("*");
		$result = $builder->get();

		if ($result) {
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return $result->getResultObject();
			}
		}else{
			return false;
		}
	}

	public function deleteDonorRecord($id,$donor_id)
	{
		$sql = "DELETE FROM donors WHERE serial_number='$id'";
		$query = $this->db->query($sql);

		if ($query) {
			$sql = "DELETE FROM `donations` WHERE donor_id='$donor_id'";
			$query1 = $this->db->query($sql);

			if ($query1) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	

	public function deleteDonationRecord($id)
	{
		$sql = "DELETE FROM donations WHERE donation_id='$id'";
		$query = $this->db->query($sql);

		if ($query) {
			// $sql = "DELETE FROM `useradress` WHERE uid='$uid'";
			// $query = $this->db->query($sql);

			// if ($query) {
			// 	return true;
			// }else{
			// 	return false;
			// }
			return true;
		}else{
			return false;
		}
	}

	public function deletesite($id)
	{
		$sql = "DELETE FROM donation_sites WHERE site_id='$id'";
		$query = $this->db->query($sql);

		if ($query) {
			// $sql = "DELETE FROM `useradress` WHERE uid='$uid'";
			// $query = $this->db->query($sql);

			// if ($query) {
			// 	return true;
			// }else{
			// 	return false;
			// }
			return true;
		}else{
			return false;
		}
	}

	public function editsite($id,$site)
	{
		$sql = "UPDATE donation_sites SET donation_site_name ='$site' WHERE site_id='$id'";
		$query = $this->db->query($sql);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function update_donor($serial_number,$donor_fname,$donor_mname,$donor_lname,$dob,$nation,$gender,$address,$email,$phone,$site,$d_status,$group)
	{
		$sql = "UPDATE donors SET donor_fname='$donor_fname',donor_mname='$donor_mname',blood_group='$group',gender='$gender',residentialAddress='$address',site_id='$site',email='$email',phone='$phone',nationality='$nation',donation_status='$d_status' WHERE serial_number='$serial_number'";

		$query = $this->db->query($sql);

		if ($query) {
			$query1 = $this->db->query("UPDATE donors SET `datebirth`='$dob',`donor_lname`='$donor_lname' WHERE serial_number='$serial_number' ");
			if ($query1) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

		
	}


	public function update_donation_details($donation_id,$hiv,$hbv,$hcv,$syphilis,$comment)
	{
		$sql = "UPDATE donations SET hiv='$hiv',hbv='$hbv',hcv='$hcv',syphilis='$syphilis',comment='$comment' WHERE donation_id='$donation_id'";

		$query = $this->db->query($sql);

		if ($query) {
			return true;
		}else{
			return false;
		}

		
	}



	public function saveDonationsites($site,$hospital_id)
	{
		$query = $this->db->query("INSERT INTO donation_sites(donation_site_name,hospital_id) VALUES('$site','$hospital_id')");
				
		if (!$query) {
			return false;
		}else{
			return $query;
		}
	}

	public function getareport($site,$fromdate,$todate,$hospital_id)
	{
		$query = $this->db->query("SELECT * FROM `donations` INNER JOIN donors ON donations.site_id=donors.site_id WHERE donations.site_id = '$site' AND date_of_donation BETWEEN '$fromdate' AND '$todate' GROUP BY sample_id");
				
		if (!$query) {
			return null;
		}else{
			return $query->getResultObject();
		}
	}

	public function getUpcomingDates($hospital_id)
	{
		$date = date("Y/m/d");

		$query = $this->db->query("SELECT * FROM `donations` INNER JOIN `donation_sites` ON donations.site_id=donation_sites.site_id WHERE donations.hospital_id = '$hospital_id' AND ORDER BY date_of_next_donation ASC");
				
		if (!$query) {
			return null;
		}else{
			return $query->getResultObject();
		}
	}


	
}


?>