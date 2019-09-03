<?php

	//echo "delete php";
	$id = $_GET['id'];

	//connect db
	$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());

	//query
	$query = "DELETE FROM student WHERE id=".$id;
	//$query = "DELETE student , studentcourse  FROM student INNER JOIN studentcourse WHERE student.id= studentcourse.student_id and student.id = $id";

	//execute query
	$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
	if($result == true){

		//echo "successful";
		//redirect to homepage
		header('location: index.php');
	} else{

		echo "Deletion Error";
	}	 

?>