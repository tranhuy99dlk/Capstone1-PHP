<?php 
	require 'connect.php';
	 require 'getCategory.php';
	if (!isset($_SESSION['user_id'])) {
		header('Location: http://localhost/medcare/Login/signin.php?no_account');
		die;
	}
	//$category_id=$_POST['category_id'];
	//$title=$_POST['title'];
	//identify title
	//identify title
	$form = true;
	require 'tool/specify3FromKey.php';
	$user_id=$_SESSION['user_id'];
	$content = $_GET['content'];
	$date=date("d/m/Y");

	// echo "topic: ". $topic .' - '. $topicID.'</br>';
	// echo "climate: ". $climate .' - '. $climateID.'</br>';
	// echo "patience: ". $patience .' - '. $patienceID.'</br>';

	$sql= "INSERT INTO qa values(null, '$keyInput', '$arrIdResult', '$content', '$user_id', 0 , 0 , '$date',  1 , '$topicID', '$climateID','$patienceID')";
	if(mysqli_query($connect,$sql)){
		header('Location: http://localhost/medcare/server/addQuestion.php?QAadded='.$key.'&cate_name='.$cate_name.'&id='.$arrIdResult.'&topic='.$topicID.'&climate='.$climateID.'&patience='.$patienceID.'&t='.$topic.'&c='.$climate.'&p='.$patience.'');

	}else{
		header('Location: http://localhost/medcare/hoidap.php?NotAdd1');
	} 

 ?>