<?php 

	//connect database
	$connect = mysqli_connect('localhost','root','','demo') or die (mysqli_error($connect));

	if(isset($_POST['addbtn']))
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$chcourse = $_POST['course'];
		

		if(preg_match("^([9]{1})([234789]{1})([0-9]{8})$^", $phone)) 
		{
 			// $phone is valid
		}

		if(preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^", $email))
		{
 			// $email is valid
		}

		//for ($i = 0; $i < count(); $i++) {}
		if(!empty($chcourse)) 
 		{
   			$N = count($chcourse);

    		echo("You selected $N course(s): ");
    		for($i=0; $i < $N; $i++)
    		{
      			echo($chcourse[$i] . " ");
   

    			/*$chcourse="";
    			foreach ($chcourse as $selected) {
    			$chcourse .= $course;*/

    			//query
				$query = "INSERT INTO student(first_name,last_name,email,phone,address) VALUES('$first_name','$last_name','$email','$phone','$address');";
			
				$query .= "INSERT INTO studentcourse(student_id,course_id) SELECT student.id, course.c_id FROM student, course WHERE student.id=LAST_INSERT_ID()";
    		}
		
			//execute query
			$result = mysqli_multi_query($connect, $query) or die(mysqli_error($connect));
			if($result==true)
			{
				//echo "succesful";
				header('location:index.php');
			} 
			else
			{
				echo "Unable to Add Student Details";
			}
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
								<textarea name="address" id="address" class="form-control" placeholder="Address">
								</textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-12">
									<label for="course">Courses available</label>					
									<div>
										<input type="checkbox" name="course[$i]" id="Java" value="Java">Java 
									</div>
									<div>
										<input type="checkbox" name="course[$i]" id="Python" value="Python">Python
									</div>
									<div>
										<input type="checkbox" name="course[$i]" id="Android" value="Android">Android
									</div>
									<div>
										<input type="checkbox" name="course[$i]" id="MS Excel" value="Microsft Excel">Microsft Excel
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