<?php 
	
	// require '../connect.php';
	$sql11="select * from qa where parent_id = 0";

	// function getanswers1($parent_id){
	// 	global $connect;
	// 	$number=0;
	// 	$sql1="select count(parent_id) as answer from qa where parent_id='$parent_id' and parent_id>0";
	// 	$result = mysqli_query($connect,$sql1);
	// 	$rows = array();
	// 	while ($row = mysqli_fetch_assoc($result)) {
	// 		$number = $row['answer'];
	// 	}
	// 	return $number;
	// }

	$result1 = mysqli_query($connect,$sql11);

	class Qa1{
		function Qa1($id,$title){
			$this->id=$id;
			$this->title=$title;	
		}
	}

	$arrQA= array();

	while(($row=mysqli_fetch_assoc($result1))){
		array_push($arrQA, new Qa1($row['qa_id'],$row['qa_title']));
	}
	// array_reverse($arr1);
	// echo "<pre>";
	//  print_r($arr1);
	//  echo "</pre>";
 ?>