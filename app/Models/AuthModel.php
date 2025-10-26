<?php
namespace App\Models;
use CodeIgniter\Model;

class AuthModel extends Model{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','userid','username','name','email','phone','role_id','userlink','password','token','status','created_by','created_on'];

    public function insertAdmin($data){
        return $this->insert($data);
    }

    public function checkEmail($email){
        $query = $this->where('email', $email)->countAllResults();
        // $db = \Config\Database::connect();
        // echo $db->getLastQuery();
        return $query;
    }

    // public function getUserData($username){
    //     return $this->select('tu.*')->from('tbl_user tu')->where('tu.email', $username)->first();
    // }

    public function getUserData($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tu.*,tam.*
        FROM tbl_user AS tu
        LEFT JOIN tbl_about_me AS tam ON tam.userid = tu.userid
        WHERE tu.status = 1 AND tu.email = '$username'");
        return $query->getRow();
    }

    public function get_users_password($userid){
		$query = $this->db->query("SELECT tu.password from tbl_user as tu where tu.userid = '$userid'");
		return $query->getRow();
	}

    public function get_last_id(){
        $query = $this->db->query("SELECT id FROM tbl_user ORDER BY 1 DESC LIMIT 1");
        return $query->getRow();
    }

    
    public function insert_record(array $data){
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_user');
        if ($builder->insert($data)) {
            return $db->insertID();
        } else {
            return false;
        }
    }

    public function check_token($token){
		$query = $this->db->query("SELECT token from tbl_user where token = '$token'");
		return $query->numRow();
	}

    public function updateRecord(string $columnName, $columnValue, string $table, array $data): bool{
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->where($columnName, $columnValue);
        $query = $builder->update($data);
        //echo $db->getLastQuery();exit;
        return $query;
    }
}
