<?php 

	require '../connect.php';
	require '../getCategory.php';
	require '../getNews.php';


	function setCate($title, $cateID , $name , $id){
		$sql1 = "update news set category_id = '$cateID' where news_id = '$id' ";
		global $connect;
		$result= mysqli_query($connect,$sql1);
		if($result==true)
		{
			echo $title." - ".$name ."-".$cateID . '</br>';
		}
	}

	
	foreach ($arrNew as $k => $tuvan) {
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
			if($stu) break;
		}
		if (!$stu) {
			setCate($tuvan->title, $arrCate[0]->cate_id,"", $tuvan->id );
		}
	}
	

 ?>