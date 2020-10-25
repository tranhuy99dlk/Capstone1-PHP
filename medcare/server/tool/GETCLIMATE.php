<?php 

	$sql='select * from climate';
	$result = mysqli_query($connect,$sql);

	class climate{
		function climate($id,$title,$description){
			$this->id=$id;
			$this->title=$title;
			$this->description= $description;
		}
	}

	$arrCli= array();

	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrCli, new climate($row['id'],$row['title'],$row['description']));
	}
	
 ?>