<?php 
	
	$sql= "select news_id, title, description, category_id, new_source,topic,climate,patience from news where status =1";
	$result= mysqli_query($connect,$sql);

	class news{
		public $id;
		public $title;
		public $description;
		public $category_id;
		public $source;

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

		public function GetID()
		{
			return $this->id;
		}

		public function GetTitle()
		{
			return $this->title;
		}

		public function GetDescription()
		{
			return $this->description;
		}

		public function GetSource()
		{
			return $this->source;
		}
	}

	$arrNew= array();

	// while(($row=mysqli_fetch_assoc($result))){
	// 	array_push($arr, new news($row['news_id'],$row['title'],$row['content'],$row['category_id'],$row['new_source']));
	// }
	// shuffle($arr);
	while ($row = mysqli_fetch_row($result)) {
		$news = new news($row['0'], $row['1'], $row['2'], $row['3'], $row['4'], $row['5'], $row['6'], $row['7']);
		$arrNew[] = $news;
	}
	// echo "<pre>";
	//  print_r(json_encode($arr));
	//  echo "</pre>";
 ?>