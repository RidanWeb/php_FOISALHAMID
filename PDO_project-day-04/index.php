<?php 

require('header.php'); 

	$sql = "SELECT * FROM students";
	$statement = $connection->prepare($sql);
	$statement->execute();

	// Store all the info into the $students Array
	$students = $statement->fetchAll(PDO::FETCH_OBJ);

?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center text-info">All Students Data Here</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- Student data table here -->
				<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">Student ID</th>
				      <th scope="col">Full Name</th>
				      <th scope="col">Email Address</th>
				      <th scope="col">Phone Number</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php foreach($students as $student):?>
				    <tr>
				      <th scope="row"><?php echo $student->std_id;?></th>
				      <td><?php echo $student->std_name;?></td>
				      <td><?php echo $student->std_email;?></td>
				      <td><?php echo $student->std_phone;?></td>
				      <td>
				      	<a href="edit.php?id=<?php echo $student->std_id; ?>" class="btn btn-success">Update</a>
				      	<a href="delete.php?id=<?php echo $student->std_id; ?>" class="btn btn-danger">Delete</a>
				      </td>
				    </tr>
					<?php endforeach;?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>


<?php require('footer.php'); ?>