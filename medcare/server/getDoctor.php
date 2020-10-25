<?php 
	$sql='select * from user where role = 2';
	$result = mysqli_query($connect,$sql);

	class doctor{
		function doctor($user_id,$user_name,$email,$password,$phone,$doctor_degree_name,$doctor_degree_major){
			$this->user_id=$user_id;
			$this->user_name=$user_name;
			$this->email=$email;
			$this->password=$password;
			$this->phone=$phone;
			$this->doctor_degree_name=$doctor_degree_name;
			$this->doctor_degree_major=$doctor_degree_major;
		}
	}

	$arr= array();

	while(($row=mysqli_fetch_assoc($result))){
		$phone = empty($row['phone'])?"chưa công khai" :$row['phone'];
		array_push($arr, new doctor($row['user_id'],$row['user_name'],$row['email'],$row['password'],$phone,$row['doctor_degree_name'],$row['doctor_degree_major']));
	}
	shuffle($arr);
	// echo "<pre>";
	//  print_r($arr);
	//  echo "</pre>";
 ?>