<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Cập nhật thông tin Người dùng&Bác sĩ</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php 
 include('connsql.php');
    $conn = connectsql();
           if (isset($_POST['tai_len'])) {
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                  $role_name =$_POST["danh_muc_user"];
                      if($role_name=="user")
                        $role=1;
                      if($role_name=="doctor")
                        $role=2;
                      if($role_name=="admin")
                         $role=3;

                  }
                  if(isset($_POST['f_name']))
                {
                  $name = $_POST['f_name'];
                  if(empty(addslashes(trim($name))))
                    {
                      echo '<script>alert("Vui lòng nhập tên !")</script>';
                    }
                }
                if(isset($_POST['email'])){
                  $email = $_POST['email'];
                  if(empty(addslashes(trim($email))))
                    {
                      echo '<script>alert("Vui lòng nhập email !")</script>';
                    }
                }
                if(isset($_POST['phone'])){
                  $phone = $_POST['phone'];
                  if(empty(addslashes(trim($phone))))
                    {
                      echo '<script>alert("Vui lòng nhập số điện thoại !")</script>';
                    }
                }
                if(isset($_POST['password'])){
                  $password = $_POST['password'];
                  if(empty(addslashes(trim($password))))
                    {
                      echo '<script>alert("Vui lòng nhập mật khẩu !")</script>';
                    }
                }
                if(isset($_POST['create_date'])){
                  $create_date = $_POST['create_date'];
                  if(empty(addslashes(trim($create_date))))
                    {
                      echo '<script>alert("Vui lòng nhập ngày tạo !")</script>';
                    }
                }
                if(isset($_POST['doctor_degree'])){
                  $doctor_degree = $_POST['doctor_degree'];
                  if(empty(addslashes(trim($doctor_degree))))
                    {
                      echo '<script>alert("Vui lòng nhập trình độ !")</script>';
                    }
                }
                if(isset($_POST['create_degree'])){
                  $create_degree = $_POST['create_degree'];
                  if(empty(addslashes(trim($create_degree))))
                    {
                      echo '<script>alert("Vui lòng nhập ngày cấp !")</script>';
                    }
                }
                if(isset($_POST['place_degree'])){
                  $place_degree = $_POST['place_degree'];
                  if(empty(addslashes(trim($place_degree))))
                    {
                      echo '<script>alert("Vui lòng nhập nơi cấp !")</script>';
                    }
                }
                if(isset($_POST['major'])){
                  $major = $_POST['major'];
                  if(empty(addslashes(trim($major))))
                    {
                      echo '<script>alert("Vui lòng nhập chuyên khoa !")</script>';
                    }
                }
                 $sql_them = "INSERT INTO user(user_id,user_name,email,password,phone,role,create_date,doctor_degree_name,doctor_degree_date,
                 doctor_degree_provider,doctor_degree_major,status) 
                 VALUES('','$name','$email','$password','$phone',$role,'$create_date','$doctor_degree','$create_degree','$place_degree','$major',1)";
                 $query_add = mysqli_query($conn,$sql_them);
                 if($query_add)
                 {
                   header('location: tables.php');
                  }
          }

            //   echo $role;
               // if($cate_id==0) echo "chua chon loai benh";

 ?>
<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block "><img src="img/admin.png" alt="" style="width: 100%; height: 100%;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Người dùng - bác sĩ</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Họ và tên" name="f_name">
                  </div>
                  <div class="col-sm-6">
                    <input type="Email" class="form-control form-control-user" id="exampleEmail" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="examplePhone" placeholder="Số điện thoại" name="phone">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="examplePassword" placeholder="Mật khẩu" name="password">
                  </div>
                </div>
               <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" id="exampleDateStart" placeholder="Ngày tạo tài khoản" name="create_date">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleStudy" placeholder="Bằng cấp" name="doctor_degree">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select style="width: 200.98px;height: 50px;" name="danh_muc_user">
                      <option value=""  selected="">--Chọn--</option>
                      <option value="user">Người dùng</option>
                      <option value="doctor">Bác sĩ</option>
                      <option value="admin">Người quản lý</option>
                      
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="exampleDateOff" placeholder="Ngày cấp" name="create_degree"> 
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleSpace" placeholder="Nơi cấp" name="place_degree">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleSubject" placeholder="Chuyên khoa" name="major">
                  </div>
                </div>
                  
              <input type="submit" name="tai_len" value="Thêm" style=" margin-left: 190px;font-size: 20px;padding: 10px 15px; width: 100px;font-family: arial;">
                <hr>
               
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
