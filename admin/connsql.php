<?php 
function connectsql(){
    $server = 'localhost';
    $username = 'root';
    $pass = '';
    $data = 'dalieu';
    $conn = mysqli_connect($server,$username,$pass,$data);
    mysqli_set_charset($conn, 'UTF8');

   return $conn;
}

 ?>