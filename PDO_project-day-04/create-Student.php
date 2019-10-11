<?php require('header.php'); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center text-info">Add New Student</h1>
			</div>
		</div>

		<?php

			$success_msg = "";

			if (isset($_POST['submit'])) {
				$full_name = $_POST['full-name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];



				if($full_name || $email || $phone != ""){

				$SQL = 'INSERT INTO students(std_name, std_email, std_phone) VALUES (:std_name, :std_email, :std_phone)';

				$statement = $connection->prepare($SQL);
				$statement->execute(
					[
						':std_name' => $full_name,
						':std_email' => $email,
						':std_phone' => $phone
					]

				);

				if($statement){

					$success_msg = '<div class="alert alert-success">New Student Inserted Successfully</div>';
				}else{
					$success_msg = '<div class="alert alert-danger">Registration Failed</div>';
				}

				}else{
					$success_msg = '<div class="alert alert-danger">Some Data Missing</div>';
				}
			}

		?>

		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="" method= "POST">

					<?php if(!empty($success_msg)) : ?>
						<?php echo $success_msg; ?>
					<?php endif;?>

					<div class="form-group">
						<label>Full Name:</label>
						<input type="text" name="full-name" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Email Address:</label>
						<input type="email" name="email" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Phone Number:</label>
						<input type="number" name="phone" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Register">
					</div>
				</form>
			</div>
		</div>

	</div>


<?php require('footer.php'); ?>