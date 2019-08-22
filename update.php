<!DOCTYPE html>
<html lang="en">
	<head> 
		<title>SMS</title>	

		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>
	<style type="text/css">
		.header{
			background: black;
			color: white;
			padding: 1%;
			text-align: center;
			margin: 10px;
		}

		.footer{
			position:absolute;
			background: black;
			color: white;
			padding: 1%;
			text-align: center;
			bottom: 1%;
			width:100%; 
		}


	</style>
	<body>
		<header class = "header">
			<h1>Student Management System</h1>
		</header><br>

		<center><h2> Update Student Details </h2></center><hr>

		<?php 
			//get values
			$id = $_GET['id'];
			//connect database
			$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());

			//query
			$query = "SELECT * FROM demo_sms WHERE id=".$id;

			//execute query
			$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
			if($result == true){

				$row = mysqli_fetch_assoc($result);
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$email = $row['email'];
				$phone = $row['phone'];
				$address = $row['address'];
				/*$course = $row['course'];*/
			}
		?>

		
		<div class="main">
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<div class="col-sm-6 col-sm-offset-6">			
							<form method="post" action="update_action.php">
								<table>
									<tr>
										<td>First Name</td>
										<td><input type="text" name="first_name" value="<?php echo $first_name; ?>" required></td>
									</tr>
									<tr>
										<td>Last Name</td>
										<td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
									</tr>
									<tr>
										<td>Phone Number</td>
										<td><input type="number" name="phone" value="<?php echo $phone; ?>"></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><input type="text" name="address" value="<?php echo $address; ?>"></td>
									</tr>
									<tr>
										<td>Courses Available :</td>
										<td style="text-align:center;"><b><input type="checkbox" name="course[]" id="java" value="<?php echo $course; ?>">Java </b></td>
										<td style="padding-right:25px"><b><input type="checkbox" name="course[]" id="python" value="<?php echo $course; ?>">Python </b></td>
										<td style="padding-left:25px"><b><input type="checkbox" name="course[]" id="android" value="<?php echo $course; ?>">Android </b></td>
										<td style="padding-left:50px"><b><input type="checkbox" name="course[]" id="excel" value="<?php echo $course; ?>">Excel </b></td>
									</tr>
									<div class="form-group">
										<tr>
											<td>&nbsp; <input type="hidden" name="id" value="<?php echo $id; ?>"></td>
											<td><input type="submit" name="submit" value="Update Student" class="btn btn-primary btn-block"></td>
										</tr>
									</div>
									<div class="form-group" > 
										<tr>
										<td>&nbsp;
										<td><a href="index.php" class="btn btn-danger btn-block">Cancel</a></td>
										</tr>
									</div>
								</table>
							</form>
						</div>
					</div>
				</div>

		<footer class="footer">
			All rights reserved. &COPY; 2019 LR			
		</footer>
	</body>
</html>