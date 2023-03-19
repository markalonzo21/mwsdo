<?php
    define('PROJECT_ROOT', 'http://localhost:8888/mwsdo/');
    date_default_timezone_set('Asia/Manila');
    $con=new mysqli("localhost","root","root","donation_database");
    function validate_data($data,$con){
        return mysqli_real_escape_string($con,htmlentities($data));
    }
?>