<?php 

require('header.php'); 




	$std_id = $_GET['id'];
	$Sql = 'DELETE FROM students WHERE std_id = :std_id';
	$statement = $connection -> prepare($Sql);
	$statement->execute(['std_id' => $std_id]);

	if($statement){
		header("location:index.php");
	}




require('footer.php'); 

?>