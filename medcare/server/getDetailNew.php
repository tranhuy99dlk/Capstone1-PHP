<?php 
	$sql="";
	$isNews = true;
	   					//quả dứa  tại sao không chữa được nám da 
	// 					Nám da tại sao chữa được bằng quả dứa
	//$news_id = $_GET['id']; 
	if(isset($_GET['id'])){
		$news_id = $_GET['id']; 
		$sql="select news_id, title, description, content, category_id, new_source from news where news_id= '$news_id' and status = 1";
		$isNews = true;
	}else if(isset($_GET['tv_id'])){
		$news_id = $_GET['tv_id']; 
		$isNews = false;
		$sql="select * from tuvan where id = '$news_id' and status = 1";
	}
	//isgoing
	
	$result = mysqli_query($connect,$sql);

	class news{
		public $id;
		public $title;
		public $description;
		public $content;
		public $category_id;
		public $source;

		function news($id,$title,$description,$content,$category_id,$source){
			$this->id=$id;
			$this->title=$title;
			$this->description=$description;
			$this->content = $content;
			$this->category_id=$category_id;
			$this->source=$source;
		}
		public function GetTitle()
		{
			return $this->title;
		}

		public function GetDescription()
		{
			return $this->description;
		}

       public function GetContent()
		{
			return $this->content;
		}
		public function GetSource()
		{
			return $this->source;
		}
	}
	$arr= array();
	while ($row = mysqli_fetch_row($result)) {
		if($isNews){
			$news = new news($row['0'], $row['1'], $row['2'], $row['3'], $row['4'],$row['5']);
		}
		else $news = new news($row['0'], $row['2'],$row['3'],$row['3'], $row['1'] ,"");
		$arr[] = $news;
		break;
	}
 ?>