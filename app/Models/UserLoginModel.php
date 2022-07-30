<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of UserLoginModel
 *
 * @author V3CT0R40
 */
class UserLoginModel extends Model {
    
   public $db;
	
	function __construct()
	{
		$this->$db = \Config\Database::connect();
	}

	public function verifyEmail($email,$password)
	{
		$builder = $this->$db->table('tbl_users');

		$hash_password = md5($password);

		$builder->select("email,phone,username,password");
		$builder->where('email',$email);
		$builder->where('password',$hash_password);
		$result = $builder->get();

		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}

	}
}
