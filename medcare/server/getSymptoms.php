<?php 
	
	require 'connect.php';

	$sql= "select * from tuvan ";
	$result= mysqli_query($connect,$sql);

	class Symptoms{
		
		function Symptoms($id,$title,$advice){
			$this->id=$id;
			$this->title=$title;
			$this->advice=$advice;
		}

	}	

	$arrAdvise= array();

	// while(($row=mysqli_fetch_assoc($result))){
	// 	array_push($arr, new news($row['news_id'],$row['title'],$row['content'],$row['category_id'],$row['new_source']));
	// }
	// shuffle($arr);
	while ($row = mysqli_fetch_row($result)) {
		$news = new Symptoms($row['0'], $row['1'], $row['2'],);
		$arrAdvise[] = $news;
	}
	// echo "<pre>";
	//  print_r($arrAdvise);
	//  echo "</pre>";
 ?>