<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "my_database";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$connection){
    die("failed to connect");
}


?>