<?php

// define constant varialbes
define('DB_NAME', 'register_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

try {
    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded language
    mysqli_set_charset($con,'utf8');
    
}catch(Exception $ex){
    print "An Exception ocurred, message". $ex->getMessage();
}catch(Error $ex){
    print "The system is busy, try later";
}