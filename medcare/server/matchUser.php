<?php 
	require 'connect.php';
	
	function getRows($result)
	{
		return $result ? mysqli_fetch_assoc($result) : 0 ;
	}

	$id=$_POST['username'];
	$pass=$_POST['pass'];
	// $page=$_POST['p'];

	$passEncode=md5($pass);

	$sql= "select  * from user where email = '$id'  and password = '$passEncode'";
	$result= mysqli_query($connect,$sql);
	$rows = getRows($result);
	if(!empty($rows)){
		$_SESSION['user_id'] = $rows['user_id'];
		$_SESSION['user_name'] = $rows['user_name'];
		$_SESSION['email'] = $rows['email'];
		$_SESSION['phone'] = $rows['phone'];
		$_SESSION['create_date'] = $rows['create_date'];
		$_SESSION['role'] = $rows['role'];
		if ( $_SESSION['role']==2) {
			$_SESSION['doctor_degree_name'] = $rows['doctor_degree_name'];
			$_SESSION['doctor_degree_major'] = $rows['doctor_degree_major'];
			$_SESSION['doctor_degree_provider'] = $rows['doctor_degree_provider'];
			$_SESSION['doctor_degree_date'] = $rows['doctor_degree_date'];
			header('Location: http://localhost/medcare/index.php');
		}
		// if (p==0) {
		// 	# code...
		// }
		else if($_SESSION['role']==3)
		{
			header('Location: http://localhost/admin/index.php');
		}
		else if($_SESSION['role']==1)
		{
			header('Location: http://localhost/medcare/index.php');
		}
	}else {
		header('Location: http://localhost/medcare/Login/signin.php?signinFail');
		
	}
 ?>