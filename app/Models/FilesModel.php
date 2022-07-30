<?php
namespace App\Models;
use CodeIgniter\Model;


/**
 * 
 */
class FilesModel extends Model
{
	public $db;
	function __construct()
	{
		$this->$db = \Config\Database::connect();
	}


	public function fileData($daterange,$site,$file)
	{
	
		$query = $this->$db->query("INSERT INTO files(file_name,data_range,site) VALUES('$file','$daterange','$site')");

		if ($query) {
			return true;
		}else{
			return $site."=>".$daterange."=>".$file;
		}
	}


	public function getFiles()
	{
		$builder = $this->$db->table('files');
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
}


?>