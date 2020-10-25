<?php 

	require "getNews.php";
    require 'getQuestions.php';
    //require 'getTuVan.php';  //temperary


	if(isset($_GET['topic'])){
		$topicID = $_GET['topic'];
	}
	if(isset($_GET['climate'])){
		$climateID = $_GET['climate'];
		//echo "co t";
	}
	if(isset($_GET['patience'])){
		$patienceID = $_GET['patience'];
		// "co t";
	}
	if(isset($_GET['id'])){
		$arrIdResult = $_GET['id'];
		//echo "co id";
	}
	if(isset($tk)===false){
		$topic=$_GET['t'];
	    $climate=$_GET['c'];
	    $patience=$_GET['p'];
	    $cate_name=$_GET['cate_name'];
	}
	
	// if(isset($_GET['cn'])){
	// 	$cate_name = $_GET['cn'];
	// 	//echo "co id";
	// }


	function isContainning($arr,$id){
		foreach ($arr as $k => $v) {
			if($v->id == $id){
				//echo  '</br>'.$v->id. 'ton tai';
				return true;
			}
		}
		return false;
	}

	function putAdvice($collection){
		global $connect;
		global $arrAdviceResult;

		$sql= "select * from tuvan $collection ";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			if (!isContainning($arrAdviceResult,$row['0'])) {
				$n = new news($row['0'], $row['2'], $row['3'], $row['1'],"",null,null,null); //last property is image
				//echo "</br>". $i . '</br>';
				$arrAdviceResult[] = $n;
			}
			
		}
		
	}
	function gatherAdvice(){
		global $arrIdResult;
		
		global $topicID;
		global $climateID;
		global $patienceID;
		global $arrAdviceResult;

		//echo "turn 1";
		putAdvice(" where category_id = '$arrIdResult' and topic = '$topicID' and climate = '$climateID' and patience = '$patienceID' ");
		if (count($arrAdviceResult)<3) {
			putAdvice("where category_id ='$arrIdResult' and climate = '$climateID' and patience = '$patienceID' ");
		}else return;
		if (count($arrAdviceResult)<3) {
			putAdvice("where category_id= '$arrIdResult' and topic= '$topicID' and patience = '$patienceID'");
		}else return;
		if (count($arrAdviceResult)<3) {
			putAdvice("where category_id= '$arrIdResult' and topic = '$topicID' and climate = '$climateID'");
		}else return;
		if (count($arrAdviceResult)<3) {
			putAdvice("where category_id ='$arrIdResult' and topic = '$topicID' ");
		}else return;
		if (count($arrAdviceResult)<3) {
			putAdvice("where category_id = '$arrIdResult' ");
		}
	}

	//isgiong

	//Questions defination------------------------------------------------------------
	function putQuestion($i){
		global $arrQuestionsResult;
		global $arr1;
		global $arrIdResult;

		global $topicID;
		global $climateID;
		global $patienceID;

		foreach ($arr1 as $k=> $v) {
			if ($i==1) {
				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->climate == $climateID && $v->patience == $patienceID) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 1";
					}	
				}
			}else if ($i==2) {
				if ($v->category_id==$arrIdResult && $v->climate == $climateID && $v->patience == $patienceID) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 2";
					}	
				}
			}else if ($i==3) {				
				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->climate == $climateID) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 3";
					}	
				}
			}else if($i==4){

				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->patience == $patienceID) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 4";
					}	
				}
			}else if ($i==5) {
				if ($v->category_id==$arrIdResult && $v->topic == $topicID ) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 5";
					}	
				}
			}else if ($i==6) {
				if ($v->category_id==$arrIdResult) {
					if (!isContainning($arrQuestionsResult,$v->id)) {
						$arrQuestionsResult[] = $v;
						//echo "</br> 6";
					}	
				}
			}
		}
	}
	
	function gatherQuestions(){
		global $arrQuestionsResult;
		$i = 1;
		while(count($arrQuestionsResult)<3 && $i<7){
			putQuestion($i++);
		}
	}


	//News defination-------------------------------------------------------------
	
	function putNews($i){
		global $arrNewsResult;
		global $arrNew;
		global $arrIdResult;

		global $topicID;
		global $climateID;
		global $patienceID;

		foreach ($arrNew as $k=> $v) {
			if ($i==1) {
				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->climate == $climateID && $v->patience == $patienceID) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 1";
					}	
				}
			}else if ($i==2) {
				if ($v->category_id==$arrIdResult && $v->climate == $climateID && $v->patience == $patienceID) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 2";
					}	
				}
			}else if ($i==3) {				
				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->climate == $climateID) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 3";
					}	
				}
			}else if($i==4){

				if ($v->category_id==$arrIdResult && $v->topic == $topicID && $v->patience == $patienceID) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 4";

					}	
				}
			}else if ($i==5) {
				if ($v->category_id==$arrIdResult && $v->topic == $topicID ) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 5";
					}	
				}
			}else if ($i==6) {
				if ($v->category_id==$arrIdResult) {
					if (!isContainning($arrNewsResult,$v->id)) {
						$arrNewsResult[] = $v;
						//echo "</br> 6";
					}	
				}
			}
		}
	}
	
	function gatherNews(){
		global $arrNewsResult;
		$i = 1;
		while(count($arrNewsResult)<3 && $i<7){
			putNews($i++);
		}
	}

	//echo "-------------------------------------------tu van" . '</br>';
	gatherAdvice();
	// echo "<pre>";
	// print_r($arrAdviceResult);
	// echo "</pre>";
	


	//echo "-------------------------------------------user's question" . '</br>';
	gatherQuestions();
	// echo "<pre>";
	// print_r($arrQuestionsResult);
	// echo "</pre>";	

	//ísgoing
	//echo "-------------------------------------------news" . '</br>';
	gatherNews();
	// echo "<pre>";
	// print_r($arrNewsResult);
	// echo "</pre>";

 ?>