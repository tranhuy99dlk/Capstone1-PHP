<?php
	//require '../connect.php';     
	//require '../getCategory.php';  //here
	require 'GETCLIMATE.php';
	require 'GETPATIENCE.php';
	//require 'GETALLQA.php';
	//require '../getNews.php';
	require 'GETTOPIC.php';

	$keyInput = $_GET['key'];

	// $keyInput = "Cách chữa trị bệnh ung thư da mãn tính cho chị em vào mùa hè ??";
	$key = trim($keyInput);
	//echo $key.'</br>';

	$topicID=null;
	$climateID=null;
	$patienceID=null;

	$topic=null;
	$climate=null;
	$patience=null;
	$cate_name=null;


		//topic
		function matchTopic(&$topic, &$id){
			global $key;
			global $arrTO;

			$c= count($arrTO);
			for($i=1;$i<$c;$i++) { //----------------$i must go from 1 when work with qa table
				$top = true;
				$arrDesc = explode("," , $arrTO[$i]->description);
				foreach ($arrDesc as $kDE => $vDE) {
					$haystack = mb_strtolower($key);
					$needle = trim(mb_strtolower($vDE));
					if (stripos($haystack, $needle) !==false) {
						$id =  $arrTO[$i]->id;
						$topic =  $arrTO[$i]->title;
						$top=false;
						break;
					}
				}
				if(!$top) break;
			}
			if ($top) {
				$id =  $arrTO[0]->id;
				$topic =  $arrTO[0]->title;
			}

		}

		//climate
		function matchClimate(&$climate,&$id){
			global $key;
			global $arrCli;
			$cli= true;
			foreach ($arrCli as $kCli => $vCli) {
				$arrDesc = explode("," , $vCli->description);
				foreach ($arrDesc as $kDE => $vDE) {
					$haystack = mb_strtolower($key);
					$needle = trim(mb_strtolower($vDE));
					if (stripos($haystack, $needle) !==false||stripos($needle, $haystack) !==false) {
						$id = $vCli->id;
						$climate = $vCli->title;
						$cli=false;
						break;
					}
				}
				if(!$cli) break;
			}
		}


		//patience
		function matchPatience(&$patience,&$id){
			global $key;
			global $arrPa;
			$pa = true;
			foreach ($arrPa as $kPa=> $vPa) {
				$arrDesc = explode("," , $vPa->description);
				foreach ($arrDesc as $kDE => $vDE) {
					$haystack = mb_strtolower($key);
					$needle = trim(mb_strtolower($vDE));
					if (strpos($haystack, $needle) !==false||stripos($needle, $haystack) !==false) {
						$id = $vPa->id;
						$patience = $vPa->title;
						$pa=false;
						break;
					}
				}
				if(!$pa) break;
			}
		}

	//when key appear and exist : find categỏry
	$arrIdResult=-1;
	$continue = true;
	foreach ($arrCate as $k => $v) {
		
		if (!$continue) {
			break;
		}

		$descArrOfthis = explode( "," , $v->description);

		foreach ($descArrOfthis as $kDE => $vDE) {
				$haystack = mb_strtolower($key);
				$needle = trim(mb_strtolower($vDE));
				if (stripos($haystack, $needle) !==false||stripos($needle, $haystack) !==false) {
				$arrIdResult=$v->cate_id;
				$cate_name=$v->cate_name;
				$continue=false;
				break;
			}
		}
	}
	if (strcmp(trim(mb_strtolower($arrIdResult)), "da")==0) {
		$arrIdResult=-1;
	}

	$arrNewsResult= array();
	$arrAdviceResult= array();
	$arrQuestionsResult= array();

	matchTopic($topic,$topicID);
	matchPatience($patience,$patienceID);
	matchClimate($climate,$climateID);

	// echo "Topic: ".$topic.' ' .$topicID. ' , Climate: '.$climate. ' '.$climateID .",  Patience: ".$patience.$patienceID;

	//$arrIdResult=-1;
	if($arrIdResult!=-1){
		
		if(isset($form)===false){
			// $topic=$_GET['t'];
   //  		$climate=$_GET['c'];
   //  		$patience=$_GET['p'];
   //  		$cate_name=$_GET['cate_name'];
			$tk=true;
			require 'server/getQuestionResult.php';
		}else {
			// header('Location: http://localhost/dichvu/medcare/hoidap.php?QAadded='.$key.'&cate_name='.$cate_name.'&id='.$arrIdResult.'&topic='.$topicID.'&climate='.$climateID.'&patience='.$patienceID.'&t='.$topic.'&c='.$climate.'&p='.$patience.'');
			//filter the duplicate values
			checkRow();
			//die;
		}	
	}
	else{
			if(!$form) {
				header("Location: http://localhost/medcare/timkiem.php?key=Chưa biết vấn đề của bạn");
				die;
			}		
			$topicDesc = explode(",", getDesc($arrCli));
			foreach ($topicDesc as $k => $v) {
				$item = explode(" ", $v);
				foreach ($item as $k1 => $v1) {
					shorten($key, trim($v1));
				}
			}

			$topicDesc2 = explode(",", getDesc($arrPa));
			foreach ($topicDesc2 as $k => $v) {
				$item = explode(" ", $v);
				foreach ($item as $k1 => $v1) {
					shorten($key, trim($v1));
				}
			}

			$topicDesc3 = explode(",", getDesc($arrTO));
			foreach ($topicDesc3 as $k => $v) {
				$item = explode(" ", $v);
				foreach ($item as $k1 => $v1) {
					shorten($key, trim($v1));
				}
			}
			$key = trim($key);
			if(strcmp($key,"")==0){  
			    header('Location: http://localhost/medcare/hoidap.php?NotAdd2');
				die;
			}else if(mb_stripos($keyInput,  $key)!==false){
				header('Location: http://localhost/medcare/hoidap.php?NotAdd1');
				die;
			}
			addToCategory($key);
			$cate_name=$key;
			$arrIdResult =  $arrCate[count($arrCate)-1]->cate_id;
		//echo '</br>'.$key;
	}
	function getDesc($table){
		global $connect;
		$descCombination="";
		$table = array_reverse($table);
		foreach($table as $k => $v){
			$descCombination .= $v->description.",";
		}
		$descCombination=str_replace(".", "", $descCombination);
		$descCombination=str_replace(",,", ",", $descCombination);
		return $descCombination;
	}

	function shorten(&$haystack,$needle){
		$result = stripos($haystack, $needle);
		if($result!== false){
			$length = strlen($needle);
			$haystack = substr($haystack, 0, $result ).substr($haystack, $result+$length);
		}
	}

	function addToCategory(&$keyInput){

		global $connect;

		$strInput = mb_strtolower(trim($keyInput));
		$desc=$keyInput;
		if (stripos($keyInput, "da")!==false&&stripos($keyInput, "bệnh")!==false) {
					$desc1=$keyInput;
					$desc2=$keyInput;
					shorten($desc,"bệnh");
					shorten($desc1,"da");
					shorten($desc2,"bệnh");
					shorten($desc2,"da");
					$desc = $desc.",".$desc1.",".$desc2;
		}else if (stripos($keyInput, "bệnh")!==false) {
			shorten($desc,"bệnh");
		}else if (stripos($keyInput, "da")!==false) {
			shorten($desc,"da");
		}
		
		//echo  "</br>".($desc);
		$sql = "INSERT into categoty values( NULL, '$keyInput', '$desc')";
		$result = mysqli_query($connect,$sql);
		
	}
	
	function checkRow() { //&$title
		global $connect,$topicID,$patienceID,$climateID,$arrIdResult;
		$number=-1;
		$selection="";
		$selection .= !is_null($topicID) ? " and topic = '$topicID'"  : "";
		$selection .= !is_null($climateID) ? " and climate = '$climateID'" : "";
		$selection .= !is_null($patienceID) ? " and patience = '$patienceID'" : "";
		$sql1="select * from qa where category_id = '$arrIdResult' $selection ";
		$result = mysqli_query($connect,$sql1);

		while ($row = mysqli_fetch_assoc($result)) {
			if(!is_null($row)){
				header('Location: http://localhost/medcare/hoidap.php?QAadded1='.$key.'&cate_name='.$cate_name.'&id='.$arrIdResult.'&topic='.$topicID.'&climate='.$climateID.'&patience='.$patienceID.'&t='.$topic.'&c='.$climate.'&p='.$patience.'');
				die;
			}
			break;
		}
	}


 ?>