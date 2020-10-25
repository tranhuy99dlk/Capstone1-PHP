<?php 
	//require 'connect.php';
	
	 class news{
		

		function news($id,$title,$description,$category_id,$source,$topic, $climate, $patience){
			$this->id=$id;
			$this->title=$title;
			$this->description=$description;
			$this->category_id=$category_id;
			$this->source=$source;
			$this->topic = $topic;
			$this->climate = $climate;
			$this->patience= $patience;
		}
	}

	$arrSymptoms = array();
	function putSymptoms(&$arrSymptoms){
		global $connect;
		global $arrSymptoms;

		$sql= "select * from tuvan ";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			$n = new news($row['0'], $row['2'], $row['3'], $row['1'],"",$row['4'], $row['5'], $row['6']);
			$arrSymptoms[] = $n;
		}
	}
	putSymptoms($arrSymptoms);
	// echo "<pre>";
	// print_r($arrSymptoms);
	// echo "</pre>";
 ?>