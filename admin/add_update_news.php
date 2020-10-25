<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Cập nhật tin tức</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php  
  include('connsql.php');
    $conn = connectsql();
     $sql = "SELECT * FROM categoty ORDER BY category_id ASC";
    $query = mysqli_query($conn,$sql);
   
           if (isset($_POST['tai_len'])) {
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                  $cate_id =$_POST["danh_muc_benh"];
                  if($cate_id==0)
                      echo '<script>alert("Vui lòng nhập danh mục !")</script>';
                }
                   if(isset($_POST['title'])){
                    $title = $_POST['title'];
                    if(empty(addslashes(trim($title))))
                    {
                      echo '<script>alert("Vui lòng nhập tiêu đề !")</script>';
                    }
                    else
                    {
                        if(isset($_POST['description'])){
                          $description = $_POST['description'];
                          if(empty(addslashes(trim($description))))
                          {
                            echo '<script>alert("Vui lòng nhập mô tả !")</script>';
                          }
                          else{
                              if(isset($_POST['content'])){
                                $content = $_POST['content'];
                                if(empty(addslashes(trim($content))))
                                {
                                  echo '<script>alert("Vui lòng nhập nội dung !")</script>';
                                }
                                else
                                {
                                  if(isset($_POST['source'])){
                                      $source = $_POST['source'];
                                      if(empty(addslashes(trim($source))))
                                      {
                                        echo '<script>alert("Vui lòng nhập link !")</script>';
                                      }
                                      else
                                      {
                                        if(isset($_POST['danh_muc_topic'])){
                                            $news_tp =$_POST["danh_muc_topic"];
                                            echo $news_tp;
                                        }
                                        if($news_tp==0){

                                          echo '<script>alert("Vui lòng chọn chủ đề")</script>';
                                        }
                                        else
                                        {
                                          if(isset($_POST['danh_muc_topic'])){
                                              $news_cl =$_POST["danh_muc_climate"];
                                          }
                                           if($news_cl==0){
                                              echo '<script>alert("Vui lòng chọn khí hậu")</script>';
                                          }
                                          else
                                          {
                                              if(isset($_POST['danh_muc_patience'])){
                                                $news_pt =$_POST["danh_muc_patience"];
                                              }
                                             if($news_pt==0){
                                                echo '<script>alert("Vui lòng chọn lứa tuổi")</script>';
                                              }
                                              else{
                                              $sql_add = "INSERT INTO news(news_id,title,description,content,category_id,new_source,status,topic,climate,patience)
                                             VALUES('','$title','$description','$content',$cate_id,'$source',1,$news_tp,$news_cl,$news_pt)";
                                            $query_add= mysqli_query($conn,$sql_add);
                                             if($query_add)
                                             {
                                               header('location: tables_tintuc.php');
                                              }
                                            }
                                          }
                                           
                                        }
                                      }
                                    }  
                                }
                            }   
                          }
                        }
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
                <h1 class="h4 text-gray-900 mb-4">Tin tức</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group row">
                     <select  name="danh_muc_benh" class="col-sm-6 mb-3 mb-sm-0" style="border-radius: 80px !important;color: #9E9E9E !important;font-size: .8rem;" selected="selected">
                                      <option >Tên bệnh</option>

                             <?php 
                               while ($row = mysqli_fetch_array($query)) {?>
                                   <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
                             <?php }?>
                    </select>
                  <div class="col-sm-6">
                     <input type="text" class="form-control form-control-user" id="exampleTitle" placeholder="Tiêu đề bài viết" name="title">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="text" class="form-control form-control-user" id="exampleDetail" placeholder="Mô tả" name="description">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleDetail" placeholder="Nội dung" name="content">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <?php 
                         $sql_topic = "SELECT * FROM topic ORDER BY id ASC";
                         $query_tp = mysqli_query($conn,$sql_topic);
                     ?>
                      <select  name="danh_muc_topic" class="col-sm-6 mb-3 mb-sm-0" style="border-radius: 80px !important;height:40px;color: #9E9E9E !important;font-size: .8rem;" selected="selected">
                                      <option >Chủ đề</option>

                             <?php 
                               while ($row = mysqli_fetch_array($query_tp)) {?>
                                   <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                             <?php }?>
                       </select>
                  </div>
                  <div class="col-sm-6">
                    <?php 
                         $sql_cl = "SELECT * FROM climate ORDER BY id ASC";
                         $query_cl = mysqli_query($conn,$sql_cl);
                     ?>
                      <select  name="danh_muc_climate" class="col-sm-6 mb-3 mb-sm-0" style="border-radius: 80px !important;height:40px;color: #9E9E9E !important;font-size: .8rem;" selected="selected">
                                      <option >Khí hậu</option>

                             <?php 
                               while ($row = mysqli_fetch_array($query_cl)) {?>
                                   <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                             <?php }?>
                       </select>
                  </div>
                </div>
                <div class="form-group row">
                
                 <?php 
                         $sql_pt = "SELECT * FROM patience ORDER BY id ASC";
                         $query_pt = mysqli_query($conn,$sql_pt);
                     ?>
                      <select  name="danh_muc_patience" class="col-sm-6 mb-3 mb-sm-0" style="border-radius: 80px !important;color: #9E9E9E !important;font-size: .8rem;" selected="selected">
                                      <option >Lứa Tuổi</option>

                             <?php 
                               while ($row = mysqli_fetch_array($query_pt)) {?>
                                   <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                             <?php }?>
                       </select>
                    <div class="col-sm-6">
                     <input type="text" class="form-control form-control-user" id="exampleCategory" placeholder="Nguồn" name="source">
                     </div> 
                </div>
                <input type="submit" name="tai_len" value="Thêm" style=" margin-left: 190px;font-size: 20px;padding: 10px 15px; width: 100px;font-family: arial;">
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
