<?php
namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model{
    public function getSkillData($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbl_skill WHERE status=1 AND userid='$userid' ORDER BY name ASC");
        return $result = $query->getResult();
    }

    public function getAccountDetails($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT 
            tu.name, tu.username, tu.email, tam.*,
            (SELECT COUNT(*) FROM tbl_follow WHERE following_id = tu.userid) AS follower,
            (SELECT COUNT(*) FROM tbl_follow WHERE follower_id = tu.userid) AS following,
            CASE 
                WHEN EXISTS (
                    SELECT 1 FROM tbl_follow 
                    WHERE following_id = tu.userid 
                    AND follower_id = '$userid'
                ) THEN 1 ELSE 0 
            END AS is_followed
        FROM tbl_user as tu
        LEFT JOIN tbl_about_me as tam ON tam.userid = tu.userid
        WHERE tu.status=1 AND tu.userid='$userid'");
        return $result = $query->getRow();
    }

    public function getPost($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.username, tu.name, tam.image, ts.name as skill, count(tl.id) as love, CASE WHEN tl2.id IS NOT NULL AND tl2.love = 1 THEN 1 ELSE 0 END as is_loved
        FROM tbl_post as tp
        LEFT JOIN tbl_skill as ts ON ts.slug = tp.skill_slug
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        LEFT JOIN tbl_love as tl ON tl.postid = tp.id AND tl.love = 1
        LEFT JOIN tbl_love as tl2 ON tl2.postid = tp.id AND tl2.userid = '$userid'
        WHERE tp.status=1 GROUP BY tp.id");
        return $result = $query->getResult();  
    }

    

    public function getSinglePost($postid,$userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.username, tu.name, tam.image, ts.name as skill, count(tl.id) as love, CASE WHEN tl2.id IS NOT NULL AND tl2.love = 1 THEN 1 ELSE 0 END as is_loved
        FROM tbl_post as tp
        LEFT JOIN tbl_skill as ts ON ts.slug = tp.skill_slug
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        LEFT JOIN tbl_love as tl ON tl.postid = tp.id AND tl.love = 1
        LEFT JOIN tbl_love as tl2 ON tl2.postid = tp.id AND tl2.userid = '$userid'
        WHERE tp.status=1 AND tp.id=$postid");
        return $result = $query->getRow();  
    }

    public function getPopularSkill(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.id, ts.name, ts.slug, COUNT(tp.id) AS no_of_post
        FROM tbl_skill AS ts
        LEFT JOIN tbl_post AS tp ON tp.skill_slug = ts.slug
        WHERE ts.status = 1 GROUP BY ts.id ORDER BY no_of_post DESC LIMIT 10");
        return $result = $query->getResult();  
    }

    public function getMyPost($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image, ts.name as skill, count(tl.id) as love, CASE WHEN tl2.id IS NOT NULL AND tl2.love = 1 THEN 1 ELSE 0 END as is_liked
        FROM tbl_post as tp
        LEFT JOIN tbl_skill as ts ON ts.slug = tp.skill_slug
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        LEFT JOIN tbl_love as tl ON tl.postid = tp.id AND tl.love = 1
        LEFT JOIN tbl_love as tl2 ON tl2.postid = tp.id AND tl2.userid = '$userid'
        WHERE tp.status=1 AND tp.userid='$userid' GROUP BY tp.id");
        return $result = $query->getResult();  
    }

    public function getMySkill($userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.*, FROM_UNIXTIME(ts.created_on, '%d %b, %Y') AS formatted_date, count(tp.id) as no_of_post
        FROM tbl_skill as ts
        LEFT JOIN tbl_post as tp ON tp.skill_slug=ts.slug
        WHERE ts.status=1 AND ts.userid='$userid' GROUP BY ts.id");
        return $result = $query->getResult();  
    }

    public function getUserPost($username,$userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image, ts.name as skill, count(tl.id) as love, CASE WHEN tl2.id IS NOT NULL AND tl2.love = 1 THEN 1 ELSE 0 END as is_liked
        FROM tbl_post as tp
        LEFT JOIN tbl_skill as ts ON ts.slug = tp.skill_slug
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        LEFT JOIN tbl_love as tl ON tl.postid = tp.id AND tl.love = 1
        LEFT JOIN tbl_love as tl2 ON tl2.postid = tp.id AND tl2.userid = '$userid'
        WHERE tp.status = 1 AND tu.username='$username' GROUP BY tp.id");
        return $result = $query->getResult();
    }

    public function getUserSkill($username){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ts.*, FROM_UNIXTIME(ts.created_on, '%d %b, %Y') AS formatted_date, count(tp.id) as no_of_post
        FROM tbl_skill as ts
        INNER JOIN tbl_user as tu ON tu.userid = ts.userid
        LEFT JOIN tbl_post as tp ON tp.skill_slug=ts.slug
        WHERE ts.status=1 AND tu.username='$username' GROUP BY ts.id");
        return $result = $query->getResult();  
    }

    public function getUserData($username,$userid){
        $db = \Config\Database::connect();
        // $query = $db->query("SELECT tu.name, tu.username, tu.email, tam.*, count(tf.id) as follower, count(tf1.id) as following, CASE WHEN tf2.id IS NOT NULL THEN 1 ELSE 0 END as is_followed
        // FROM tbl_user as tu
        // LEFT JOIN tbl_about_me as tam ON tam.userid = tu.userid
        // LEFT JOIN tbl_follow as tf ON tf.following_id = tu.userid
        // LEFT JOIN tbl_follow as tf1 ON tf1.follower_id = tu.userid
        // LEFT JOIN tbl_follow as tf2 ON tf2.following_id = tu.userid AND tf2.follower_id = '$userid'
        // WHERE tu.status=1 AND tu.username='$username'");


        $query = $db->query("SELECT 
            tu.name,
            tu.username,
            tu.email,
            tam.*,
            (SELECT COUNT(*) FROM tbl_follow WHERE following_id = tu.userid) AS follower,
            (SELECT COUNT(*) FROM tbl_follow WHERE follower_id = tu.userid) AS following,
            CASE 
                WHEN EXISTS (
                    SELECT 1 FROM tbl_follow 
                    WHERE following_id = tu.userid 
                    AND follower_id = '$userid'
                ) THEN 1 ELSE 0 
            END AS is_followed
        FROM tbl_user AS tu
        LEFT JOIN tbl_about_me AS tam ON tam.userid = tu.userid
        WHERE tu.status = 1 
        AND tu.username = '$username'");
        return $result = $query->getRow();
    }

    public function getLoveData($userid,$postid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tl.* 
        FROM tbl_love as tl
        WHERE tl.userid='$userid' AND tl.postid=$postid");
        return $result = $query->getNumRows();
    }

    public function getFollowData($followerid,$followingid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tf.* 
        FROM tbl_follow as tf
        WHERE tf.follower_id='$followerid' AND tf.following_id='$followingid'");
        return $result = $query->getNumRows();
    }

    public function getSkillPost($skill,$userid){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tp.*, tu.name, tam.image, tu.username, ts.name as skill, count(tl.id) as love, CASE WHEN tl2.id IS NOT NULL AND tl2.love = 1 THEN 1 ELSE 0 END as is_loved
        FROM tbl_post as tp
        LEFT JOIN tbl_skill as ts ON ts.slug = tp.skill_slug
        INNER JOIN tbl_user as tu ON tu.userid = tp.userid
        INNER JOIN tbl_about_me as tam ON tam.userid = tu.userid
        LEFT JOIN tbl_love as tl ON tl.postid = tp.id AND tl.love = 1
        LEFT JOIN tbl_love as tl2 ON tl2.postid = tp.id AND tl2.userid = '$userid'
        WHERE tp.status=1 AND tp.skill_slug='$skill' GROUP BY tp.id");
        return $result = $query->getResult();  
    }
}