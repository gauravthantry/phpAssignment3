<?php
include_once 'MYSQLDB.php';
$host = 'localhost' ;
$dbUser ='root';
$dbPass ='#Unsouled2018';
$dbName ='gamingforum';

$db = new MySQL( $host, $dbUser, $dbPass, $dbName ) ;
$db->selectDatabase();
?>
