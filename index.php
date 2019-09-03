<html>
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
		</header> <br>

		<div class="container">

			<center><a href="add.php" class="btn btn-primary">Add Student</a></center>
			<br>
			<hr>
			
			<table class="table table-striped">

			    <thead>
			     	 <tr class="bg-dark text-white text-center">
			      		<th>Serial No.</th>
			        	<th>First Name</th>
			       		<th>Last Name</th>
			        	<th>Email</th>
			       		<th>Phone No.</th>
				   		<th>Actions</th>
			      		</tr>
			    </thead>
			    <tbody>

			    <?php 

					//connect database
					$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());
					//query
					$query = "SELECT * FROM student";

					//execute query
					$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
					
					$sn=1;
					if($result == true)
					{
						while($row = mysqli_fetch_assoc($result))
						{	?>

						<tr class="text-center">
							<td><?php echo $sn++ ; ?> </td>
							<td><?php echo $row['first_name']; ?> </td>
							<td><?php echo $row['last_name']; ?> </td>
							<td><?php echo $row['email']; ?> </td>
							<td><?php echo $row['phone']; ?> </td>
							<td>
								<a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info" >VIEW</a>
								<a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning" >EDIT</a>
								<a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger">DELETE</a>
							</td>
						</tr>
							<?php
						}
					}
				?> 
			    </tbody>
			</table>
		</div>
		<footer class="footer">
			All rights reserved. &COPY; 2019 LR			
		</footer>		
	</body>
</html>