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
	protected $allowedFields = ['donor_id','donor_lname','donor_mname','donor_lname','blood_group','datebirth','gender','occupation','residentialAddress','site_id','email','phone','hospital_id','district_id','province_id'];
	
	protected $useTimestamps = true;
	protected $createdField = 'added_on';
	
}

?>