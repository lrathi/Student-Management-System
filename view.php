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
		</header><br><br>

		<div class="container" >
			<center><h2>Student Details</h2></center><hr>

			<center><a href="index.php" class="btn btn-primary" >Go Back</a></center>
			<hr>

			<table class="table table-hover">
				<div class="row justify-content-center">
			    	<thead>
			     	 <tr class="bg-dark text-white text-center">
			       	 	<th>First Name</th>
			       		<th>Last Name</th>
			       	 	<th>Email</th>
			       		<th>Phone No.</th>
			        	<th>Address</th>
			        	<th>Course/s Selected</th>
			        	<th>Actions</th>
			      	</tr>
			    	</thead>
			    	<tbody>

			    	<?php

						//get values
						$id = $_GET['id'];

						//connect database
						$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());

						//query
						//$query = "SELECT * FROM student WHERE id=$id";
						$query = "SELECT S.id,S.first_name,S.last_name,S.email,S.phone,S.address,GROUP_CONCAT(DISTINCT C.c_name) as Course  FROM student AS S 
									JOIN studentcourse AS SC ON SC.student_id = S.id   
									JOIN course AS C ON SC.course_id = C.c_id WHERE S.id=$id";

						//execute query
						$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
							
						if(mysqli_num_rows($result) > 0)
						{

							while($row = mysqli_fetch_assoc($result))
							{	?>

								<tr class="text-center">
									<td><?php echo $row['first_name']; ?> </td>
									<td><?php echo $row['last_name']; ?> </td>
									<td><?php echo $row['email']; ?> </td>
									<td><?php echo $row['phone']; ?> </td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['Course']; ?></td>
									<td>
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning" > Edit </a>
										<a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" >Delete</a>
									</td>
								</tr>
								
								<?php
							}
						}
					 ?> 
			    	</tbody>
				</div>
			</table>
		</div>
		<footer class="footer">
			All rights reserved. &COPY; 2019 LR			
		</footer>	
	</body>
</html>