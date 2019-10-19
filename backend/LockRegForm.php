<?php

include_once('config/database.php');
$db = new DB();
//$con = $db->get_connection();

    class LockRegForm {

        function __construct() {
            
        }

        public function checkStatus() {

            //global $con;
            global $db;            
            $query = 'SELECT * FROM reg_form_status';
            $res = $db->query($query);
            $row = mysqli_fetch_assoc($res);
            return $row['status'];
            
        }

        public function setStatus($status) {

            //global $con;
            global $db;
            $query = "UPDATE reg_form_status SET status = '".$status."'";
            $res = $db->query($query);
            $count = $db->affected_rows();

            if($count > 0) {
                // status updated
                header("Refresh:0");

            } else {
                // failed, error, not updated
                // header('dashboard.php');
                header("Refresh:0");
            }
            
        }

        public function getNoOfInterns() {
            //global $con;
            global $db;
            $query = 'SELECT * FROM interns';
            $res = $db->query($query);
            $count = $db->affected_rows();
            return $count;
        } 

        public function getNoOfMentors() {
            //global $con;
            global $db;
            $query = 'SELECT * FROM mentors';
            $res = $db->query($query);
            $count = $db->affected_rows();
            return $count;
        } 

        public function getNoOfAdmins() {
            //global $con;
            global $db;
            $query = 'SELECT * FROM admins';
            $res = $db->query($query);
            $count = $db->affected_rows();
            return $count;
        }

    }
?>