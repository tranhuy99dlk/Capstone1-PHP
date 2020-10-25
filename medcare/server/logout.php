<?php 
	require 'connect.php';
		if($_SESSION['user_id']>0){
			session_destroy();
		}
		header('Location: http://localhost/medcare/Login/signin.php');
 ?>