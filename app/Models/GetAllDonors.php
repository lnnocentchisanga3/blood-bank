<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 */
class GetAllDonors extends Model
{
	protected $table = 'donors';
	protected $primaryKey = 'serial_number';
	protected $returnType = 'object';
	protected $allowedFields = ['sample_id','donor_lname','donor_mname','donor_lname','hiv','hbv','hcv','syphilis','comment','date_of_donation','date_of_next_donation','site','hospital_id','district_id','province_id'];
	
	protected $useTimestamps = true;
	protected $createdField = 'added_on';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	
}

?>