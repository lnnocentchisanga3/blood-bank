<?php 
namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class AddDonorsModel extends Model
{
	public function saveDonors($sample_id,$donorfname,$donormname,$donorlname,$hiv,$hbv,$hcv,$syphilis,$group,$comment,$dod,$donextd,$site,$hospital_id,$province_id,$district_id)
	{
		$db = \Config\Database::connect();

		$length = count($sample_id);
		$i = 0;
		$query = "";

			while ($i < $length) {
				$query = $db->query("INSERT INTO donors(sample_id,donor_fname,donor_mname,donor_lname,hiv,hbv,hcv,syphilis,blood_group,comment,date_of_donation,date_of_next_donation,site_id,hospital_id,district_id,province_id) VALUES('$sample_id[$i]','$donorfname[$i]','$donormname[$i]','$donorlname[$i]','$hiv[$i]','$hbv[$i]','$hcv[$i]','$syphilis[$i]','$group','$comment[$i]','$dod','$donextd','$site','$hospital_id','$district_id','$province_id')");
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