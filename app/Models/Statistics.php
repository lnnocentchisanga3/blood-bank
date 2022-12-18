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


	public function getStatistics1($hospital_id,$year)
	{

     $builder = $this->db->table('donations');
     $builder->join('donation_sites','site_id');
		$builder->where('donations.site_id',$hospital_id);
		$builder->where('donation_sites.hospital_id',$hospital_id);
		$builder->select("*");
		$result = $builder->get();

	
			if (count($result->getResultArray()) == null) {
				return 0;
			}else{
				return $result->getResultArray();
			}
		

	}


	public function getStatistics($hospital_id,$year)
	{
		$years = date("Y");

     $query = $this->db->query("SELECT COUNT(donation_id) AS num , donation_site_name FROM donations INNER JOIN donation_sites ON donations.site_id=donation_sites.site_id WHERE donation_sites.hospital_id='$hospital_id' AND donations.year_added = '$year' GROUP BY donation_sites.donation_site_name");
     $result = $query->getResult();            

	if (count($result) == null) {
		return $year;
	}else{
		return $result;
	}

	}

	
}

?>