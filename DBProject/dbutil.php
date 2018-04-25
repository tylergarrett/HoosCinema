<?php
session_start();
class DbUtil{
        if ($_SESSION['username'] == 'admin') {
              public static $loginUser = "CS4750mhh5rec";       // admin ic C  
        } else {
              public static $loginUser = "CS4750mhh5reb";       // regular user is B
        } 
        public static $loginPass = "mitchell";
        public static $host = "stardock.cs.virginia.edu"; // DB Host
        public static $schema = "CS4750mhh5re"; // DB Schema

        public static function loginConnection(){
                $db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);

                if($db->connect_errno){
                        echo("Could not connect to db");
                        $db->close();
                        exit();
                }

                return $db;
        }

}
?>
