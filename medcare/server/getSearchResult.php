<?php 

	//require 'connect.php';
	require 'getCategory.php';          //temperary

	// require "getNews.php";
    // require 'getQuestions.php';  //temperary

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : -1;
    $key = $_POST['key'];

	// $user_id = 9;
	// $key = "bong do vớ vẩn";

	$arrIdResult=-1;
	$continue = 1;
	for($i=0;$i<count($arrCate);$i++){

	  //count($arrCate);
		if ($continue==0) {
			break;
		}
		//so sánh key nhập vào với key trong description on category-. lấy ra id_category
		$descArrOfthis = explode( "," , $arrCate[$i]->description);

		foreach ($descArrOfthis as $k => $v) {
			if (strpos($v, $key)!==false||strpos($key, $v)!==false) {
				$arrIdResult=$arrCate[$i]->cate_id;
				//echo $arrCate[$i]->description;   //temporary
				$continue=0;
				break;
			}
		}
	}


	$arrNewsResult= array();
	$arrSymptomsResult= array();
	$arrQuestionsResult= array();


	class news{
		function news($id,$title,$description,$category_id,$source){
			$this->id=$id;
			$this->title=$title;
			$this->description=$description;
			$this->category_id=$category_id;
			$this->source=$source;
		}
	}
	function getanswers1($parent_id){
		global $connect;
		$number=0;
		$sql1="select count(parent_id) as answer from qa where parent_id='$parent_id' and parent_id>0";
		$result = mysqli_query($connect,$sql1);
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$number = $row['answer'];
		}
		return $number;
	}
	class Qa1{
		function Qa1($id,$title,$category_id,$content,$user_id,$parent_id,$create_date,$user_name,$answer,$email){
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


	function putSymptoms($id){
		global $connect;
		global $arrSymptomsResult;

		$sql= "select * from tuvan where category_id = '$id' ";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			$n = new news($row['0'], $row['2'], $row['3'], $row['1'],"");
			$arrSymptomsResult[] = $n;
		}

	}

	//Questions defination------------------------------------------------------------
	
	function putQuestions($id){
		global $connect;
		global $arrQuestionsResult;
		global $user_id;

		$sql="select qa_id,qa_title,category_id,qa_content,qa.user_id,parent_id,qa.create_date, user_name, email from qa, user where parent_id = 0 and user.user_id=qa.user_id and qa.user_id <> '$user_id' and category_id ='$id' ";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			$n = new Qa1($row['0'], $row['1'], $row['2'],$row['3'],$row['4'],$row['5'],$row['6'],$row['7'],getanswers1($row['0']),$row['8']);
			$arrQuestionsResult[] = $n;
		}
		
	}

	//News defination-------------------------------------------------------------
	
	function putNews($id){
		global $connect;
		global $arrNewsResult;
		global $news;

		$sql= "select * from news where category_id = '$id' and status = 1";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			$n = new news($row['0'], $row['1'], $row['2'], $row['3'], $row['4'],);
			$arrNewsResult[] = $n;
		}
		
	}

	putSymptoms($arrIdResult);
	putQuestions($arrIdResult);
	putNews($arrIdResult);

 ?>