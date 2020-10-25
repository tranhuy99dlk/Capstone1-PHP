<?php 

	$id = $_SESSION['user_id'];

	$arr=0;

	//user's question
	$sqlUserCmt= "select count(qa_id) as qa_id from qa where parent_id = 0 and user_id = '$id' ";
	$result = mysqli_query($connect,$sqlUserCmt);
	$row=3;
	$row=mysqli_fetch_assoc($result);
		$arr= $row['qa_id'];


	$arrQsOfUser=array();
	$sqlUserCmt= "select qa_id from qa where parent_id = 0 and user_id = '$id' ";
	$result = mysqli_query($connect,$sqlUserCmt);
	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrQsOfUser, $row['qa_id']);
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
	$number2=count($arrQsNonOfUser);


	function getanswers2($parent_id){
		global $connect;
		$number=0;
		$sql1="select count(parent_id) as answer from qa where parent_id='$parent_id' and parent_id>0 and user_id <> '$parent_id' ";
		$result = mysqli_query($connect,$sql1);
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$number = $row['answer'];
		}
		return $number;
	}

	$number3=0;
	$count = count($arrQsOfUser);
	for($i=0;$i<$count;$i++){
		if(getanswers2($arrQsOfUser[$i])>0){
			$number3++;
		}	
	}

 ?>