<?php 
namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class AddDonorsModel extends Model
{
	// public function saveDonors($sample_id,$donorfname,$donormname,$donorlname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$dod,$donextd,$site,$hospital_id,$province_id,$district_id)
	// {
	// 	$db = \Config\Database::connect();

	// 	$length = count($sample_id);
	// 	$i = 0;
	// 	$query = "";

	// 		while ($i < $length) {
	// 			$query = $db->query("INSERT INTO donors(sample_id,donor_fname,donor_mname,donor_lname,hiv,hbv,hcv,syphilis,blood_group,comment,date_of_donation,date_of_next_donation,site_id,hospital_id,district_id,province_id) VALUES('$sample_id[$i]','$donorfname[$i]','$donormname[$i]','$donorlname[$i]','$hiv[$i]','$hbv[$i]','$hcv[$i]','$syphilis[$i]','$group','$comment[$i]','$dod','$donextd','$site','$hospital_id','$district_id','$province_id')");
	// 			$i++;
	// 		}


	// 	if (!$query) {
	// 		return false;
	// 	}else{
	// 		return $query;
	// 	}
	// }

	public function saveDonors($sample_id,$donor_id,$dateod,$donextd,$site)
	{
		$db = \Config\Database::connect();

		$year = date('Y');

		
		$query = $db->query("INSERT INTO donations(sample_id,donor_id,site_id,year_added,date_of_donation,date_of_next_donation) VALUES('$sample_id','$donor_id','$site','$year','$dateod','$donextd')");


		if (!$query) {
			return false;
		}else{
			return $query;
		}
	}

	public function saveDonorOne($donor_id,$donor_fname,$donor_mname,$donor_lname,$marital,$national,$nrc,$group,$site,$hospital_id,$province_id,$district_id,$dateob,$gender,$occupation,$doldon,$sod,$postaladdress,$email,$phone,$numofdonation)
	{
		$db = \Config\Database::connect();


	$query = $db->query("INSERT INTO donors(donor_id,donor_fname,donor_mname,donor_lname,blood_group,datebirth,gender,occupation,residentialAddress,site_id,email,phone,hospital_id,province_id,district_id,nationality,nrc,marital_status,site_of_last_donation,date_of_last_donation,number_of_donations) VALUES
		('$donor_id','$donor_fname','$donor_mname','$donor_lname','$group','$dateob','$gender','$occupation','$postaladdress','$site','$email','$phone','$hospital_id','$province_id','$district_id','$national','$nrc','$marital','$sod','$doldon','$numofdonation')");

		if (!$query) {
			return false;
		}else{
			return $query;
		}
	}
}



 ?>