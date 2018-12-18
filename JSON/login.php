<?php 
	define('HOST','localhost');

	define('USER','root');

	define('PASS','Avarti2018');

	define('DB','fifon_pepsico');


	 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');



	
	if($_SERVER['REQUEST_METHOD']=='POST'){

	$username = $_POST['username'];
		
	$password = $_POST['password'];


	$sql = "SELECT * FROM Usuarios WHERE user_name='$username' AND pass='$password'";

	
	$result = mysqli_query($con,$sql);

	$check = mysqli_fetch_array($result);

	
	if(isset($check))
	{

	echo "success";

	}
	else{

	echo "failure";

	}

		mysqli_close($con);

	}
