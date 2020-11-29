<?php
include_once 'MYSQLDB.php';
$host = 'localhost' ;
$dbUser ='root';
$dbPass ='#Unsouled2018';
$dbName ='gamingforum';

$db = mysqli_connect( $host, $dbUser, $dbPass, $dbName ) ;
$db->selectDatabase();
?>
