<?php 
	if(isset($_POST['addbtn'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		/*$course = $_POST['course'];*/

		//connect database
		$connect = mysqli_connect('localhost','root','','demo') or die (mysqli_error($connect));
		//query
		$query = "INSERT INTO demo_sms SET first_name='$first_name',
											last_name='$last_name',
											email='$email',
											phone='$phone',
											address='$address'";

		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		if($result==true){

			//echo "succesful";
			header('location:index.php');
		} else{

			echo "Unable to Add Student Details";
		}

		}
	

?>

<!DOCTYPE html>
<html lang="en">
	<head> 
		<title>SMS</title>	

		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

		<center><h2> Add new student </h2></center><hr>

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<div class="col-sm-6 col-sm-offset-6">
						<form action="" method="post">
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label for="phone">Phone Number</label>
								<input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Address">
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-12">
									<label for="course">Courses available</label>
									<div>
										<input type="checkbox" name="course[]" id="kotlin" value="kotlin">Kotlin
									</div>							
									<div>
										<input type="checkbox" name="course[]" id="java" value="java">Java 
									</div>
									<div>
										<input type="checkbox" name="course[]" id="python" value="python">Python
									</div>
									<div>
										<input type="checkbox" name="course[]" id="android" value="android">Android
									</div>
									<div>
										<input type="checkbox" name="course[]" id="excel" value="excel">Excel
									</div>
								</div>
							</div>
							<div class="form-group">
								<button name="addbtn" class="btn btn-primary btn-block">Add Student</button>			
							</div>
							<div>
								<a href="index.php" class="btn btn-danger btn-block">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>		
		<footer class="footer">
			All rights reserved. &COPY; 2019 LR			
		</footer>	
	</body>
</html>