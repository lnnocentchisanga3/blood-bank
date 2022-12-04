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
		$hash_password = md5($password);

		$result = $this->$db->query("SELECT * FROM tbl_users WHERE email='$email' OR username='$email' ");

		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}

	}

	public function getStaffs($id)
	{
		$builder = $this->$db->table('tbl_users');
		$builder->where('hospital_id',$id);
		$builder->select("*");
		$result = $builder->get();

		if (count($result->getResultArray()) == 0) {
			return false;
		}else{
			return $result->getResultArray();
		}
	}

	public function getStaffOne($user_id)
	{
		$builder = $this->$db->table('tbl_users');
		$builder->where('user_id',$user_id);
		$builder->select("*");
		$result = $builder->get();

		if (count($result->getResultArray()) == 0) {
			return false;
		}else{
			return $result->getResultArray();
		}
	}

	public function saveStaff($fname,$lname,$username,$email,$password,$phone,$role,$hospital,$district_id,$province_id)
	{
		
	$query = $this->$db->query("INSERT INTO tbl_users(fname,lname,phone,email,username,password,user_role,hospital_id,district_id,province_id) VALUES('$fname','$lname','$phone','$email','$username','$password','$role','$hospital','$district_id','$province_id')");

		if (!$query) {
			return false;
		}else{
			return true;
		}
	}

	public function updateStaff($fname,$lname,$username,$email,$password,$phone,$role,$hospital,$district_id,$province_id,$user_id)
	{
		if ($password == null || $password == '') {
			$query = $this->$db->query("UPDATE tbl_users SET fname='$fname',lname='$lname',phone='$phone',email='$email',username='$username',user_role='$role',hospital_id='$hospital',district_id='$district_id',province_id='$province_id' WHERE user_id='$user_id'");

		if (!$query) {
			return false;
		}else{
			return true;
		}
		}else{
			$pwd = md5($password);
			$query = $this->$db->query("UPDATE tbl_users SET fname='$fname',lname='$lname',phone='$phone',email='$email',username='$username',password='$pwd',user_role='$role',hospital_id='$hospital',district_id='$district_id',province_id='$province_id' WHERE user_id='$user_id'");

		if (!$query) {
			return false;
		}else{
			return true;
		}
		}
	}

	public function deleteuser($user_id)
	{
		$sql = "DELETE FROM tbl_users WHERE user_id='$user_id'";
		$query = $this->$db->query($sql);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}
