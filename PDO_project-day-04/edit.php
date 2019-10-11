<?php require('header.php'); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center text-info">Update Student Data</h1>
			</div>
		</div>

		<?php

			$std_id = $_GET['id'];

			$Sql = 'SELECT * FROM students WHERE std_id = :std_id'; //database er id
			$statement = $connection->prepare($Sql);
			$statement->execute([':std_id'=>$std_id]); 

			$student = $statement->fetch(PDO::FETCH_OBJ);









			if (isset($_POST['update'])) {
				$full_name = $_POST['full-name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];

				if($full_name || $email || $phone != ""){

				$SQL = 'UPDATE students SET std_name = ?, std_email = ?, std_phone = ? WHERE std_id = ?';

				$statement = $connection->prepare($SQL);

				$statement->execute([$full_name, $email, $phone, $std_id]);

				if ($statement) {
					header("location:index.php");
				}

			}
		}

		?>

		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="" method= "POST">

					<div class="form-group">
						<label>Full Name:</label>
						<input type="text" name="full-name" class="form-control" autocomplete="off" required value="<?php echo $student->std_name; ?>">
					</div>
					<div class="form-group">
						<label>Email Address:</label>
						<input type="email" name="email" class="form-control" autocomplete="off" required value="<?php echo $student->std_email; ?>">
					</div>
					<div class="form-group">
						<label>Phone Number:</label>
						<input type="number" name="phone" class="form-control" autocomplete="off" required value="<?php echo $student->std_phone; ?>">
					</div>
					<div class="form-group">
						<input type="submit" name="update" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>
		</div>

	</div>


<?php require('footer.php'); ?>