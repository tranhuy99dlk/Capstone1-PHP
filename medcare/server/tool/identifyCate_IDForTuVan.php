<?php 

	require '../connect.php';
	require '../getCategory.php';

	$arrSymptomsResult = array();


	class news{
		function news($id,$title,$description,$category_id,$source){
			$this->id=$id;
			$this->title=$title;
			$this->description=$description;
			$this->category_id=$category_id;
			$this->source=$source;
		}
	}

	function putSymptoms(){

		global $connect;
		global $arrSymptomsResult;

		$sql= "select * from tuvan ";
		$result= mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_row($result)) {
			$n = new news($row['0'], $row['2'], $row['3'], $row['1'],"");
			$arrSymptomsResult[] = $n;
		}

		// echo "<pre>";
		// print_r($arrSymptomsResult);
		// echo "</pre>";

	}
 

	function setCate($title, $cateID , $name , $id){
		$sql1 = "update tuvan set category_id = '$cateID' where id = '$id' ";
		global $connect;
		$result= mysqli_query($connect,$sql1);
		if($result==true)
		{
			echo $title." - ".$name ."-".$cateID . '</br>';
		}
	}

	putSymptoms();


	
	foreach ($arrSymptomsResult as $k => $tuvan) {
		$stu= false;
		foreach ($arrCate as $k1 => $cate) {

			$arrCateDesc = explode("," , $cate->description);

			foreach ($arrCateDesc as $k2 => $cateDesc) {
				$haystack = mb_strtolower($tuvan->title);
				$needle = trim(mb_strtolower($cateDesc));
				if (stripos($haystack, $needle) !==false) {
					$stu= true;
					setCate($tuvan->title, $cate->cate_id, $cateDesc, $tuvan->id );
					break;
				}
			}
			if($stu) {
				//setCate($tuvan->title, $arrCate[0]->cate_id,"", $tuvan->id );
				break; 
			}
		}
		if (!$stu) {
			setCate($tuvan->title, $arrCate[0]->cate_id,"", $tuvan->id );
		}
	}
	

 ?>