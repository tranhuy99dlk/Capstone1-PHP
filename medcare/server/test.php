<?php 
	require 'connect.php';
	$r=8;
	$sql = 'select * from user';
	$result=mysqli_query($connect,$sql);
	if(($row=mysqli_fetch_assoc($result)))
	echo $row['email'];
 ?>