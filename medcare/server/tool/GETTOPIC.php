<?php 
	// require '../connect.php';
	$sql='select * from topic';
	$result = mysqli_query($connect,$sql);

	class topic{
		function topic($id,$title,$description){
			$this->id=$id;
			$this->title=$title;
			$this->description= $description;
		}
	}

	$arrTO= array();

	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrTO, new topic($row['id'],$row['title'],$row['description']));
	}
	// echo "<pre>";
	//  print_r($arrTO);
	//  echo "</pre>";
	
 ?>