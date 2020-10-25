
<?php 
	require '../connect.php';
	//require '../getCategory.php';
	require 'GETCLIMATE.php';
	require 'GETPATIENCE.php';
	require 'GETALLQA.php';
	//require '../getNews.php';
	require 'GETTOPIC.php';
	//require '../getTuVan.php';
	

	function changeTopic($table,$field, $arg, $specifiedID, $origionalID, $pattern, $specifiedTopic){   
		$sql1 = "UPDATE $table set $field = '$specifiedID' where $arg = '$origionalID' ";
		global $connect;
		$result= mysqli_query($connect,$sql1);
		if($result==true)
		{
			echo $pattern." - ".$specifiedTopic ."-".$specifiedID . '</br>';
		}
	}
	
	foreach ($arrQA as $k => $v) {

		$top=true;
		$cli=true;
		$pa=true;
		
		//topic
		$c= count($arrTO);
		for($i=1;$i<$c;$i++) {     //-----------------------------$i must go from 1 when work with qa table
			$arrDesc = explode("," , $arrTO[$i]->description);
			foreach ($arrDesc as $kDE => $vDE) {
				$haystack = mb_strtolower($v->title);
				$needle = trim(mb_strtolower($vDE));
				if (stripos($haystack, $needle) !==false) {
					changeTopic('qa','topic','qa_id',$arrTO[$i]->id, $v->id, $v->title, $vDE." - ".$arrTO[$i]->title );
					$top=false;
					break;
				}
			}
			if(!$top) break;
		}
		if ($top) {
			changeTopic('qa','topic','qa_id', $arrTO[0]->id, $v->id, $v->title, $arrTO[0]->title );
		}

		//climate
		foreach ($arrCli as $kCli=> $vCli) {
			$arrDesc = explode("," , $vCli->description);
			foreach ($arrDesc as $kDE => $vDE) {
				$haystack = mb_strtolower($v->title);
				$needle = trim(mb_strtolower($vDE));
				if (stripos($haystack, $needle) !==false) {
					changeTopic('qa','climate','qa_id',$vCli->id,$v->id,$v->title, $vDE." - ".$vCli->title);
					$cli=false;
					break;
				}
			}
			if(!$cli) break;
		}

		//patience
		foreach ($arrPa as $kPa=> $vPa) {
			$arrDesc = explode("," , $vPa->description);
			foreach ($arrDesc as $kDE => $vDE) {
				$haystack = mb_strtolower($v->title);
				$needle = trim(mb_strtolower($vDE));
				if (stripos($haystack, $needle) !==false) {
					changeTopic('qa','patience','qa_id',$vPa->id, $v->id,$v->title, $vDE." - ".$vPa->title);
					$pa=false;
					break;
				}
			}
			if(!$pa) break;
		}
		echo "</br>";


	}
		

 ?>