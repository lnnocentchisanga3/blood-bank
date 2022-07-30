<?php 
namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class AddDonorsModel extends Model
{
	/*protected $table = 'donors';
	protected $primaryKey = 'serial_number';
	protected $returnType = 'array';

	protected $allowedFields = ['sample_id','donor_name','hiv','hbv','hcv','syphilis','comment','date_of_donation','date_of_next_donation','site'];

	protected $useTimestamps = true;
	protected $createdField = 'added_on';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';*/

	/*protected $validationRules = [
			'sampleid' => 'required',
			'names' => 'required',
			'hiv' => 'required',
			'hbv' => 'required',
			'hcv' => 'required',
			'syphilis' => 'required',
			'comment' =>'required',
			'dod' => 'required',
			'donextd' => 'required',
			'site' => 'required'
	];*/
	

	public function saveDonors($sample_id,$donor,$hiv,$hbv,$hcv,$syphilis,$comment,$dod,$donextd,$site)
	{
		$db = \Config\Database::connect();

		$length = count($sample_id);
		$i = 0;
		$query = "";

			while ($i < $length) {
				$query = $db->query("INSERT INTO donors(sample_id,donor_name,hiv,hbv,hcv,syphilis,comment,date_of_donation,date_of_next_donation,site) VALUES('$sample_id[$i]','$donor[$i]','$hiv[$i]','$hbv[$i]','$hcv[$i]','$syphilis[$i]','$comment[$i]','$dod','$donextd','$site')");
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