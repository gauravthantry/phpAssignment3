<?php
require_once "dbConnect.php";
 	$file=fopen('../data/initializeTables.sql','r');
 	$sql='';
 	while(!feof($file)){
 		$data=trim(fgets($file));
 		if (!(substr($data,0,2)=='//' || substr($data,0,2)=='--')) {
 			$sql.=' '.$data;
 			if (substr($data,-1)==';') {
 				execute ($db,$sql);
 				$sql='';
 			}
 		}
  }

 	fclose($file);
 	if (strpos($sql, ';')) {
 		execute($db, $sql);
 	}

  function execute($db, $sql){
    $db->query($sql);
    echo "executing :".$sql."<br>";
  }
  echo "DB built";
 ?>
