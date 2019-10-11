<?php 
	
	$dns		='mysql:host = localhost;dbname=pdo_project';
	$username	='root';
	$password	='';
	$options	=[];


	// $connection = new PDO($dns, $username, $password, $options);

	try{
		$connection = new PDO($dns, $username, $password, $options);
		// echo "We are here";
	}catch(PDOException $e){

	}

?>