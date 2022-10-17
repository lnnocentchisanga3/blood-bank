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
				return $result->getResultArray();
			}
		}else{
			return false;
		}
	}

	public function deleteDonorRecord($id)
	{
		$sql = "DELETE FROM donors WHERE serial_number='$id'";
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

	public function update_donor($id,$sample_id,$donorfname,$donormname,$donorlname,$hiv,$hbv,$hcv,$syphilis,$comment,$dod,$donextd,$site,$hospital_id,$province_id,$district_id,$group)
	{
		$sql = "UPDATE donors SET sample_id='$sample_id',donor_fname='$donorfname',donor_mname='$donormname',donor_lname='$donorlname',hiv='$hiv',hbv='$hbv',hcv='$hcv',syphilis='$syphilis',comment='$comment',date_of_donation='$dod',date_of_next_donation='$donextd',site_id='$site',hospital_id='$hospital_id',province_id='$province_id',district_id='$district_id',blood_group='$group' WHERE serial_number='$id'";
		$query = $this->db->query($sql);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}



	public function saveDonationsites($site,$hospital_id)
	{
		$length = count($site);
		$i = 0;
		$query = "";

			while ($i < $length) {
				$query = $this->db->query("INSERT INTO donation_sites(donation_site_name,hospital_id) VALUES('$site[$i]','$hospital_id')");
				$i++;
			}


		if (!$query) {
			return false;
		}else{
			return $query;
		}
	}


	
}


?>