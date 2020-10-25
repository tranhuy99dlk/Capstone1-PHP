<?php 
	require 'connect.php';

	$email= $_POST['email'];
	$p=$_POST['password'];
	$pass=md5($p);

	$sql="select * from user where email = '$email' and password = '$pass' ";

	$result = mysqli_query($connect,$sql);

	class doctor{
		function doctor($email,$password){
			$this->email=$email;
			$this->password=$password;
		}
		
	}

	$arr= array();
	while(($row=mysqli_fetch_assoc($result))){
		array_push($arr,new doctor($row['email'],$row['password']));
		break;
	}
	echo json_encode($arr);
 ?>