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
		$this->$db = \Config\Database::connect();
	}


	public function getStatistics1()
	{

     $query = $this->$db->query("SELECT * FROM donors GROUP BY site");
        $result = $query->getResult();             

	if (count($result) == null) {
		return false;
	}else{
		return $result;
	}

	}


	public function getStatistics()
	{

     $query = $this->$db->query("SELECT COUNT(sample_id) AS num FROM donors GROUP BY site");
     $result = $query->getResult();            

	if (count($result) == null) {
		return false;
	}else{
		return $result;
	}

	}

	
}

?>