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
                        <li><a href="https://www.skype.com/en/features/skype-web/"><i class="ti-skype"></i></a></li>
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
    <!--================Header Menu Area =================-->


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container" style="margin-top: 70px">
                <div
                class="banner_content d-md-flex justify-content-between align-items-center"
                >
                <div class="mb-3 mb-md-0">
                    <h2>Chi Tiết Tin Tức</h2>
                    <!-- <p>Belding years moveth earth green behold wherein</p> -->
                </div>
                
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->


<!--================Blog Area =================-->
<section class="blog_area single-post-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
               
                    <?php include("server/getDetailNew.php"); 
                    // $txt='<div class="feature-img row" style="margin-top:-30px;">
                    // <h3 style="font-size:22px">'.$arr[0]->title.'</h3>
                    //             <img class="img-fluid" src="'.$arr[0]->source.'" alt="">
                    //         </div>
                    //         <div class="single-blog">
                    //             <div class="_details">                                   
                    //                 <p style="font-size: 16px;">'.$arr[0]->content.'</p>
                    //             </div>
                    //         </div>';
                     $txt='
                         <div class="row">
                         <div class="col-md-2">
                             
                         </div>
                              <h3 class="col-md-8" style="font-size:22px">'.$arr[0]->title.'</h3>

                         </div>
                         <div class="row">
                          <div class="col-md-2">
                             
                         </div>
                             <img class="img-fluid col-md-8" src="'.$arr[0]->source.'" alt="">
                              
                         </div>
                         <div class="row">
                          <div class="col-md-2">
                             
                         </div>
                             <p class="col-md-8" style="font-size: 16px;">'.$arr[0]->content.'</p>
                         </div>
                          ';
                        echo  $txt;
                    ?>
<!--  -->
</div>
</div>
</section>
 <section class="hotline-area text-center area-padding" style="margin-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Điên thoại tu vấn 24/7</h2>
                    <span>(034)-7927070</span>
                    <p class="pt-3">Chúng tôi sẵn sàng giúp bạn vượt qua khó khăn mặc cảm, hãy để chúng tôi cảm nhận và cùng bạn đánh bại chúng</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 5px;">
                <a style="color: pink;text-align: center; font-size: 18px;" class="dn_btn" href="mailto:TuVanSucKhoe.@gmail.com"><i class=""></i>TuVanSucKhoe.@gmail.com</a>
                <a style="color: yellow;margin-left: 5px;" href="https://www.facebook.com/tuvansuckhoe24h.com.vn/"><i class="ti-facebook"></i></a>
                <a style="color: yellow;margin-left: 5px;"  href="https://secure.skype.com/portal/overview"><i class="ti-skype"></i></a>
            </div>
    </section>
    <div class="footer" style="text-align: center; margin-bottom: 20px;">
        <hr>
         Dịch vụ được hoàn hiện bởi  | <a href="#" target="_blank">Lê Văn Tự</a>
    </div>
    <!-- ================ Hotline Area End ================= -->  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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






