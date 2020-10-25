<?php 
	$id = -1;	
	if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];
	}
	//require 'connect.php';

	$arrQsOfUser=array();

	//user's question
	$sqlUserCmt= "select qa_id from qa where parent_id = 0 and user_id = '$id' ";
	$result = mysqli_query($connect,$sqlUserCmt);
	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrQsOfUser, $row['qa_id']);
	}
	//echo json_encode($arrQsOfUser);
	class Qa2{
		function Qa2($id,$title,$category_id,$content,$user_id,$parent_id,$create_date,$user_name,$answer,$email){
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
		}
	}
	

	$arrQsNonOfUser=array();

	//qs'id user commented
	$sqlOtherCmt= "select parent_id from qa where parent_id > 0 and user_id = '$id' ";
	$result1 = mysqli_query($connect,$sqlOtherCmt);
	while(($row=mysqli_fetch_assoc($result1))){
		$id=$row['parent_id'];
		if (array_search($id, $arrQsNonOfUser)===false&&array_search($id, $arrQsOfUser)===false) {
			array_push($arrQsNonOfUser, $row['parent_id']);
		}
	}
	//echo json_encode($arrQsNonOfUser);

	$arrMain=array();

	$count= count($arrQsNonOfUser);

	$dem = ($count-3)>=0?($count-3):0;
	for($i=($count-1);$i>=$dem;$i--){

		$sqlCmt="select qa_id,qa_title,category_id,qa_content,qa.user_id,parent_id,qa.create_date, user_name, email from qa, user where parent_id = 0 and user.user_id=qa.user_id and qa.qa_id = '$arrQsNonOfUser[$i]' ";

		$result2= mysqli_query($connect,$sqlCmt);

		while(($row=mysqli_fetch_assoc($result2))){
			array_push($arrMain, new Qa2($row['qa_id'],$row['qa_title'],$row['category_id'],$row['qa_content'],$row['user_id'],$row['parent_id'],$row['create_date'],$row['user_name'],getanswers($row['qa_id']),$row['email']));
		}
	}

	// echo "<pre>";
	// print_r($arrMain);
	// echo "</pre>";

	// $arr=array();
	// array_push($arr, '1');
	// array_push($arr, '2');
	// array_push($arr, '3');
	// if(array_search('65', $arr)===false){
	// 	echo '0co';
	// }
		
 ?>