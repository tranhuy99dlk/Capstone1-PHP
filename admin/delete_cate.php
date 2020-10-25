<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Cập nhật thông tin danh mục</title>

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
        if(isset($_POST['danh_muc_benh'])){
            $cate_name = $_POST['danh_muc_benh'];
          }
       $sql_del = "UPDATE categoty SET status = 0 WHERE category_name='$cate_name'";
          $query_del= mysqli_query($conn,$sql_del);
            if($sql_del)
              {
                header('location: tables_danhmuc.php');
              }
    }
    
  }
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
                <h1 class="h4 text-gray-900 mb-4">Danh mục</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group">
                <select  name="danh_muc_benh" class="col-sm-12 mb-3 mb-sm-0" style="border-radius: 80px !important;color: #9E9E9E !important;font-size: .8rem;" selected="selected">
                                      <option >--Chọn--</option>

                             <?php 
                             $a= "SELECT * FROM categoty ORDER BY category_id ASC";
                            $query_a = mysqli_query($conn,$a);
                               while ($row = mysqli_fetch_array($query_a)) {?>
                                   <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
                             <?php }?>
                    </select>
                    
                </div>
                <input type="submit" name="tai_len" value="Xóa" style=" margin-left: 190px;font-size: 20px;padding: 10px 15px; width: 100px;font-family: arial;">
                <hr>
              </form> 
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
