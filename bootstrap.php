<?php

require __DIR__.'/vendor/autoload.php';


//$servername = "localhost";
//$username = "root";
//$password = null;
//$dbname = "pruebaequipos";

$configuration = array(
    'db_sname'  => 'localhost',
    'db_user' => 'root',
    'db_pass' => null,
    'db_dbname' => 'pruebaequipos'
);
//
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}