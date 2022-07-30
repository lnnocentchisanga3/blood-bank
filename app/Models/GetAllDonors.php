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
	protected $allowedFields = ['sample_id','donor_name','hiv','hbv','hcv','syphilis','comment','date_of_donation','date_of_next_donation','site'];
	
	protected $useTimestamps = true;
	protected $createdField = 'added_on';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	
}

?>