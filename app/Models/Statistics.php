<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * 
 */
class Statistics extends Model
{
	public $db;
	
	function __construct()
	{
		$this->db = \Config\Database::connect();
	}


	public function getStatistics1($hospital_id)
	{

     $builder = $this->db->table('donors');
     $builder->join('donation_sites','hospital_id');
		$builder->where('donors.hospital_id',$hospital_id);
		$builder->where('donation_sites.hospital_id',$hospital_id);
		//$builder->groupBy('serial_number','ASC');
		$builder->select("*");
		$result = $builder->get();

	
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return $result->getResultArray();
			}
		

	}


	public function getStatistics($hospital_id)
	{

     $query = $this->db->query("SELECT COUNT(serial_number) AS num , donation_site_name FROM donors INNER JOIN donation_sites ON donors.site_id=donation_sites.site_id WHERE donors.hospital_id='$hospital_id' AND donation_sites.hospital_id='$hospital_id' GROUP BY donation_sites.donation_site_name");
     $result = $query->getResult();            

	if (count($result) == null) {
		return $hospital_id;
	}else{
		return $result;
	}

	}

	
}

?>