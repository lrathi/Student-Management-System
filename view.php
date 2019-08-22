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

			<center><a href="index.php" class="btn btn-primary" >Go Back</a></center>
			<br>
			<br>

			<table class="table table-hover">
				<div class="row justify-content-center">
			    	<thead>
			     	 <tr class="bg-dark text-white text-center">
			      		<th>Serial No.</th>
			       	 	<th>Firstname</th>
			       		<th>Lastname</th>
			       	 	<th>Email</th>
			       		<th>Phone No.</th>
			        	<th>Address</th>
			        	<th>Course Selected</th>
			      	</tr>
			    	</thead>
			    	<tbody>

			    	<?php
			    
						//get values
						$id = $_GET['id'];
						
						//connect database
						$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());

						//query
						$query = "SELECT * FROM demo_sms WHERE id=".$id;

						//execute query
						$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
			
						if(mysqli_num_rows($result) > 0)
						{

							while($row = mysqli_fetch_assoc($result))
							{	?>

								<tr class="text-center">
									<td><?php echo $row['id'] ?> </td>
									<td><?php echo $row['first_name']; ?> </td>
									<td><?php echo $row['last_name']; ?> </td>
									<td><?php echo $row['email']; ?> </td>
									<td><?php echo $row['phone']; ?> </td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['course']; ?></td>
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