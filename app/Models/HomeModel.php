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

    public function getPopularSkill(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.id, ts.name, ts.slug, COUNT(tp.id) AS no_of_post
        FROM tbl_skill AS ts
        LEFT JOIN tbl_post AS tp ON tp.skillid = ts.id
        WHERE ts.status = 1 GROUP BY ts.id ORDER BY no_of_post DESC LIMIT 10");
        return $result = $query->getResult();  
    }

    public function getMyPost($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image
        FROM tbl_post as tp
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tp.status=1 AND tp.userid='$userid'");
        return $result = $query->getResult();  
    }

    public function getMySkill($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.*, FROM_UNIXTIME(ts.created_on, '%d %b, %Y') AS formatted_date, count(tp.id) as no_of_post
        FROM tbl_skill as ts
        LEFT JOIN tbl_post as tp ON tp.skillid=ts.id
        WHERE ts.status=1 AND ts.userid='$userid' GROUP BY ts.id");
        return $result = $query->getResult();  
    }

    public function getUserPost($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image
        FROM tbl_post as tp
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tp.status=1 AND tu.username='$username'");
        return $result = $query->getResult();  
    }

    public function getUserSkill($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.*, FROM_UNIXTIME(ts.created_on, '%d %b, %Y') AS formatted_date, count(tp.id) as no_of_post
        FROM tbl_skill as ts
        INNER JOIN tbl_user as tu ON tu.userid = ts.userid
        LEFT JOIN tbl_post as tp ON tp.skillid=ts.id
        WHERE ts.status=1 AND tu.username='$username' GROUP BY ts.id");
        return $result = $query->getResult();  
    }

    public function getUserData($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tu.name, tu.username, tu.email, tam.* 
        FROM tbl_user as tu
        LEFT JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tu.status=1 AND tu.username='$username'");
        return $result = $query->getRow();
    }
}