<?php 
	//echo "edit action php;"
	$id = $_POST['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	/*$course = $_POST['course'];*/

	//connect database
	$connect = mysqli_connect('localhost','root','','demo') or die(mysqli_error());

	

   	//query
	$query = "UPDATE demo_sms SET first_name='$first_name',
									last_name='$last_name',
									email='$email',
									phone='$phone',
									address='$address'
									/*course='$course',*/
									WHERE id=".$id;
 								


	$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
	if($result == true){

		//echo "succesful";
		//redirect to homepage
		header('location: index.php');
		
		} else{
			echo "failed";
	}													

?>