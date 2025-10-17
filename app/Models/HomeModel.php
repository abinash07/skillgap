<?php
namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model{
    public function getSkillData(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbl_skill WHERE status=1 ORDER BY name ASC");
        return $result = $query->getResult();
    }

    public function getAccountDetails($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tu.name, tu.username, tu.email, tam.* 
        FROM tbl_user as tu
        LEFT JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tu.status=1");
        return $result = $query->getRow();
    }

    public function getPost(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image
        FROM tbl_post as tp
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tp.status=1");
        return $result = $query->getResult();  
    }
}