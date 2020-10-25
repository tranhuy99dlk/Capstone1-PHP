<?php 
	$id = -1;	
	if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
	}
	

	$sql="select qa_id,qa_title,category_id,qa_content,qa.user_id,parent_id,qa.create_date from qa, user where parent_id = 0 and user.user_id=qa.user_id and qa.user_id = '$id' ";


	function getanswers($parent_id){
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

	$result = mysqli_query($connect,$sql);

	class Qa{
		function Qa($id,$title,$category_id,$content,$user_id,$parent_id,$create_date,$answer){
			$this->id=$id;
			$this->title=$title;
			$this->category_id=$category_id;
			$this->content=$content;
			$this->user_id=$user_id;
			$this->parent_id=$parent_id;
			$this->create_date=$create_date;
			$this->answer=$answer;
		}
	}

	$arr2= array();

	while(($row=mysqli_fetch_assoc($result))){
		array_push($arr2, new Qa($row['qa_id'],$row['qa_title'],$row['category_id'],$row['qa_content'],$row['user_id'],$row['parent_id'],$row['create_date'],getanswers($row['qa_id'])));
	}
	//shuffle($arr2);
	array_reverse($arr2);
	// echo "<pre>";
	//  print_r($arr);
	//  echo "</pre>";
 ?>