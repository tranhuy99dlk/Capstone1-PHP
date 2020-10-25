<?php 
	$sql='select * from patience';
	$result = mysqli_query($connect,$sql);

	class patience{
		function patience($id,$title,$description){
			$this->id=$id;
			$this->title=$title;
			$this->description= $description;
		}
	}

	$arrPa= array();

	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrPa, new patience($row['id'],$row['title'],$row['description']));
	}
	
 ?>