<?php 
	// if (!isset($_GET['qa_id'])) {
	// 	header('Location: http://localhost/dichvu/medcare/post_detail.php');
	// 	return;
	// }
	$qa_id =$_GET['qa_id'];
	
	$sqlUser = "select user_name,qa.create_date,category_name, qa_title,qa_content from qa,user,categoty where qa_id = '$qa_id' and user.user_id = qa.user_id and categoty.category_id = qa.category_id";
	class user{
		function user($user_name,$create_date,$category_name,$qa_title,$qa_content){
			$this->user_name=$user_name;
			$this->create_date=$create_date;
			$this->category_name=$category_name;
			$this->qa_title=$qa_title;
			$this->qa_content=$qa_content;
		}
	}

	$sqlComment= "select qa.create_date, qa_content, user_name, doctor_degree_name, email,role from user,qa where parent_id= '$qa_id' and qa.user_id= user.user_id"; 
	class comment
	{
		function comment($create_date,$qa_content,$user_name,$email,$role)
		{
			$this->user_name=$user_name;
			$this->email=$email;
			$this->create_date=$create_date;
			$this->qa_content=$qa_content;	
			$this->role=$role;	
		}
	}

	$result1=mysqli_query($connect,$sqlUser);
	$row=mysqli_fetch_assoc($result1);
	$user = new user($row['user_name'],$row['create_date'],$row['category_name'],$row['qa_title'],$row['qa_content']);
	
	$user_namee=isset($_SESSION['user_name'])?$_SESSION['user_name']:"";
	
	
	$result2=mysqli_query($connect,$sqlComment);
	$cmt=array();
	while(($row=mysqli_fetch_assoc($result2))){
		$name =strcmp($row['user_name'],$user_namee)==0?"Bạn":$row['user_name'];
		$email=$row['email'];
		if(strcmp($name,"Bạn")!=0){
			$name =  $row['doctor_degree_name'].' '.$name;
		}else $email="";
		array_push($cmt, new comment($row['create_date'],$row['qa_content'],$name,$email,$row['role']));
	}
	

 ?>