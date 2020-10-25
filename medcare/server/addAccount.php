<?php 
	require 'connect.php';

	$name=$_POST['username'];
	$pass=$_POST['pass'];
	// $page=$_POST['p'];

	$passEncode=md5($pass);
	$email = $_POST['email'];
	 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
   if(!checkemail($email)){
      echo "Invalid email address.";
   }
   else{
      $phone = $_POST['phone'];
	  $date = date('d/m/Y');
	  echo $date;
	  $sql = "INSERT INTO user(user_id,user_name,email,password,phone,role,create_date,doctor_degree_name,doctor_degree_date,
                 doctor_degree_provider,doctor_degree_major,status) 
                 VALUES('','$name','$email','$passEncode','$phone',1,'$date','','','','',1)";
	   $result= mysqli_query($connect,$sql);
	
			header('Location: http://localhost/medcare/index.php');
   }
	
 ?>