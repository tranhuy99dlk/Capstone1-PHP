<?php 
    require 'server/connect.php';
 ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Sức khỏe Việt Nam</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css"> 
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/styleCustom.css">
    <link rel="stylesheet" href="css/font.css">
</head>
<body>

    <!--================Header Menu  =================-->

    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left">
                    <a class="dn_btn" href="mailto:TuVanSucKhoe.@gmail.com"><i class="ti-email"></i>TuVanSucKhoe.@gmail.com</a>
                </div>
                <div class="float-right">
                    <ul class="list header_social">
                       
                        <li><a href="https://www.facebook.com/tuvansuckhoe24h.com.vn/"><i class="ti-facebook"></i></a></li>
                        <li><a href="https://secure.skype.com/portal/overview"><i class="ti-skype"></i></a></li>
                    </ul>   
                </div>
            </div>  
        </div>  
        <!-- =============================MAIN MENU -->

     <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                     <a style="font-size: 20px; color: purple" class="navbar-brand logo_h" href="index.php"><img src="img/quan.png" alt="">Sức khỏe</a>
                     <form action="timkiem.php" method="GET">
                    <input type="text" class="search-box" placeholder= "vd: bệnh viêm da mủ..." style="width: 230px ;height:40px;" name="key" required="Vui lòng gõ gì đó">
                        <input type="submit" value="Tìm" style="margin-left: 5px; border: 1px solid blue; height: 40px; background-color: green;color: white;width: 48px;">
                     </form>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                           <li class="nav-item"><a class="nav-link font" href="index.php">Trang chủ</a></li> 
                            
                            <li class="nav-item"><a class="nav-link font" href="doctors.php">Bác sĩ</a></li>    
                            <li class="nav-item">
                                <a href="hoidap.php" class="nav-link font">Tư vấn</a>
                            </li> 
                            <li class="nav-item"><a class="nav-link font" href="TinTuc.php">Tin tức</a></li> 
                           <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle font" data-toggle="dropdown"role="button" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link font" href="Login/signup.php">Đăng Ký</a></li>
                                    <?php if(isset($_SESSION['user_id'])): ?>
                                        <li class="nav-item"><a class="nav-link font" href="server/logout.php">Đăng xuất</a></li> 
                                    <?php else: ?>
                                        <li class="nav-item"><a class="nav-link font" href="Login/signin.php">Đăng nhập</a></li> 
                                    <?php endif; ?>
                                </ul>
                            </li> 
                             <?php if(isset($_SESSION['user_id'])): ?>
                                <?php 
                                    $name=substr($_SESSION['user_name'],strrpos($_SESSION['user_name']," "));
                                 ?>
                                <li class="nav-item"><a href="userInfo.php" class="nav-link font" style="color: #780664">Hi <?php echo $name; ?> </a></li> 
                             <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>


     <!-- ====================================Tin tức ======================== -->
     <section class="blog-area area-padding">
        <div class="container">
            <div class="Title_Banner row">
                <div class="col-md-5 col-xl-4">
                    <h1 style="color: black">Tin tức mới nhất</h1>
                </div>
            </div>


            <div class="row">
                <?php 
                //chi tiết tin tức 
                include("server/getNews.php");

                    foreach ($arrNew as $key => $value) {
                        $text = '<div class="col-md-6 col-lg-4 col-md-4">
                            <div class="single-blog">
                                <div class="thumb">
                                    <img class="img-fluid" src="'.$value->GetSource().'" alt="">
                                </div>
                                <div class="short_details">                                  
                                        <a class="d-block" href="single-blog.php?id='.$value->GetID().'"><h4>'.$value->GetTitle().'</h4></a>
                                    <p style="margin-top:-10px;">'.$value->GetDescription().'</p>
                                </div>
                            </div>
                        </div>' ;
                        echo $text;
                    }
                ?>

            

                    <!-- function printNews($index){
                        global $arr;
                        $content=substr($arr[$index]->content,0,70)."...";
                        $text='<div class="col-md-6 col-lg-4 col-md-4">
                        <div class="single-blog">
                            <div class="thumb">
                                <img class="img-fluid" src="'.$arr[$index]->source.'" alt="">
                            </div>
                            <div class="short_details">
                                <a class="d-block" href="single-blog.php">
                                    <h4>'.$arr[$index]->title.'</h4>
                                </a>
                                <p style="margin-top:-10px;">'.$content.'</p>
                            </div>
                        </div>
                        </div>';
                        return $text;
                    } -->
                    <!-- 
                    $i=0;
                    while($i<12){
                        echo printNews($i);
                        $i+=1;
                    }
                 ?> -->
            </div>
        </div>
        </section>
   <div class="footer" style="text-align: center; margin-bottom: 20px;">
        <hr>
         Dịch vụ được hoàn hiện bởi | <a href="#" target="_blank">Lê Văn Tự</a>
    </div>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
</html>