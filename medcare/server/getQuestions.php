<?php 
	//require 'connect.php';
	$id1 = -1;	
	if (isset($_SESSION['user_id'])) {
		$id1 = $_SESSION['user_id'];
	}
	

	$sql11="select qa_id,qa_title,category_id,qa_content,qa.user_id,parent_id,qa.create_date, user_name, email, topic, climate, patience from qa, user where parent_id = 0 and user.user_id=qa.user_id order by qa_id DESC";
	function getanswers1($parent_id){
		global $connect;
		$number=0;
		$sql1="select count(parent_id) as answer from qa where parent_id='$parent_id' and parent_id>0";
		$result = mysqli_query($connect,$sql1);
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$number = $row['answer'];
		}
		return $number;
	}

	$result1 = mysqli_query($connect,$sql11);

	class Qa1{
		function Qa1($id,$title,$category_id,$content,$user_id,$parent_id,$create_date,$user_name,$answer,$email,$topic, $climate, $patience){
			$this->id=$id;
			$this->title=$title;
			$this->category_id=$category_id;
			$this->content=$content;
			$this->user_id=$user_id;
			$this->parent_id=$parent_id;
			$this->create_date=$create_date;
			$this->user_name=$user_name;
			$this->answer=$answer;
			$this->email=$email;
			$this->topic = $topic;
			$this->climate = $climate;
			$this->patience= $patience;
		}
	}

	$arr1= array();

	while(($row=mysqli_fetch_assoc($result1))){
		array_push($arr1, new Qa1($row['qa_id'],$row['qa_title'],$row['category_id'],$row['qa_content'],$row['user_id'],$row['parent_id'],$row['create_date'],$row['user_name'],getanswers1($row['qa_id']),$row['email'],$row['topic'],$row['climate'],$row['patience']));
	}
	//array_reverse($arr1);
	// echo "<pre>";
	// print_r($arr1);
	// echo "</pre>";
 ?>