<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','userid','username','name','email','phone','role_id','userlink','password','status','created_by','created_on'];

    public function insertAdmin($data){
        return $this->insert($data);
    }


    public function checkEmail($email){
        $query = $this->where('email', $email)->countAllResults();

        // $db = \Config\Database::connect();
        // echo $db->getLastQuery();
        
        return $query;
    }

    public function getUserData($username){
        return $this->select('tu.*')
            ->from('tbl_user tu')
            ->where('tu.email', $username)
            ->first();
    }

    public function get_users_password($userid){
		$query = $this->db->query("SELECT tu.password from tbl_user as tu where tu.userid = '$userid'");
		return $query->getRow();
	}
}
