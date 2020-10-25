<?php 

	$sql='select * from categoty';
	$result = mysqli_query($connect,$sql);

	class category{
		function category($category_id,$category_name,$description){
			$this->cate_id=$category_id;
			$this->cate_name=$category_name;
			$this->description= $description;
		}
	}

	$arrCate= array();

	while(($row=mysqli_fetch_assoc($result))){
		array_push($arrCate, new category($row['category_id'],$row['category_name'],$row['description']));
	}
	// echo "<pre>";
	//  print_r($arr);
	//  echo "</pre>";
 ?>