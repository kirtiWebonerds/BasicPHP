<?php
        session_start();
    $host='localhost';
	$user='root';
	$pass='';
	$db='crud_db';
    
	$sql =mysql_connect($host , $user , $pass);
	
	if($sql){
		 mysql_select_db($db);
	}

?>