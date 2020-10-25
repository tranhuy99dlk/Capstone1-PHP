<?php 
	require 'connect.php';
	if (!isset($_SESSION['user_id'])) {
		header('Location: http://localhost/medcare/Login/signin.php?no_account');
	}
	$user_id =$_SESSION['user_id'];
	$answer = $_GET['cmt'];
	$qa_id=$_GET['qa_id'];
	$date=date("d/m/Y");
	$title="";
	$sql="INSERT INTO qa VALUES(null, '$title', 1, '$answer' , '$user_id', '$qa_id', 0, '$date', 1, null, null ,null)";

	if (mysqli_query($connect,$sql)) {
		header('Location: http://localhost/medcare/post_detail.php?qa_id='.$qa_id.' ');
	}

 ?>