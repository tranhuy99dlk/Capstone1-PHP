<?php 
    require 'server/connect.php';
    require 'server/getCategory.php';
    //require "server/getNews.php";
    //require 'server/getQuestions.php';
    require 'server/tool/specify3FromKey.php';
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
    <link rel="stylesheet" href="css/timkiemCustom.css">
    <link rel="stylesheet" href="css/font.css">
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
                        <li><a href="https://www.facebook.com/tuvansuckhoe24h.com.vn/"><i class="ti-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://secure.skype.com/portal/overview"><i class="ti-skype"></i></a>
                        </li>
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
    
    <!-- documentation from website -->

    <!-- other relevant question from other people -->
    <section>
            <div class="service-area area-padding-top">
            <div class="container">
                <div style="margin-top: 15px; margin-bottom: 50px;">
                    <?php //return value Search
                     $key = $_GET['key'];
                            $text= '<h3><span style="color: black">Kết quả: </span><span style="color:blue;font-size:25px;"><i>'.$key.'</i></span><h3>';
                            
                            echo $text;
                            $target = '';
                            $target .= is_null($cate_name)?"":'<span>Bệnh: '.ucfirst($cate_name).'</span> ';
                            $target .= is_null($topic)?"":'<span>Chủ đề: '.ucfirst($topic).'</span> ';
                            $target .= is_null($climate)?"":'<span>Thời điểm: '.ucfirst($climate).'</span> ';
                            $target .= is_null($patience)?"":'<span>Đối tượng: '.ucfirst($patience).'</span> ';
                            //$text1='<h3 style="color:purple;margin-top:25px"><u>'.$target.'</u></h3>';
                            echo '<div style="color:white;margin-top:25px" class="object">'.$target.'</div>';
                 ?>
                </div>
               <div class="area-headin row">
                    <div class="col-md-5 col-xl-4">
                        <h4><u>Thông tin</u><?php if(($c= count($arrAdviceResult))==0) echo "  (chưa có thông tin liên quan!)"; ?><br>
                        </h4>
                    </div>
                </div>
                <div class="row">
                <?php 
                    

                    function printAdvice($index){
                        global $arrAdviceResult;
                        $content=substr($arrAdviceResult[$index]->description,0,300)."...";
                        $text='<div class="col-md-6 col-lg-4 col-md-4" >
                        <div class="single-blog" >
                            <div class="short_details" style = "background-color: #acdbc9; padding:10px;">
                                <a class="d-block" href="single-blog.php?tv_id='.$arrAdviceResult[$index]->id.'">
                                    <h4>'.($index+1).'.'.$arrAdviceResult[$index]->title.'</h4> </a>
                               
                                <p>'.$content.'</p>
                            </div>
                        </div>
                        </div>';
                        return $text;
                    }
                    
                    $j=count($arrAdviceResult)>3?3:count($arrAdviceResult);
                    $i=0;
                    while($i<$j){
                        echo printAdvice($i);
                        $i++;
                    }
                 ?>
            </div>
            </div>
        </div>
    </section>

     <section>
        <div class="service-area area-padding-top">
            <div class="container">
                <div class="area-headin row"  style="margin-top: -100px;">
                    <div class="col-md-5 col-xl-4">
                        <h4><u>Mọi người hỏi </u><?php if(($c= count($arrQuestionsResult))==0) echo "  (chưa có bài viết liên quan!)"; ?><br>
                        </h4>
                    </div>
                </div>
                <div class="row" >
                     <?php 
                        //require 'server/getQuestions.php';
                        $j=count($arrQuestionsResult)>3?3:count($arrQuestionsResult);
                        
                        for($i=0;$i<$j;$i++){
                            $name=substr($arrQuestionsResult[$i]->user_name,strrpos($arrQuestionsResult[$i]->user_name," "));
                            $title = $arrQuestionsResult[$i]->title;
                            $subTitle = strlen($title) > 64? substr($title, 0, 70)."..." : $title;
                            $text= '<div class="col-md-6 col-lg-4" >
                                        <a href="post_detail.php?qa_id='.$arrQuestionsResult[$i]->id.'">
                                        <div class="card-service text-center text-lg-left mb-4 mb-lg-0">
                                            <span class="card-service__icon">'.$name.'</span>
                                            <p><a class="user_email" href="mailto:'.$arrQuestionsResult[$i]->email.'">'.$arrQuestionsResult[$i]->email.'</a></p>
                                             <a href="post_detail.php?qa_id='.$arrQuestionsResult[$i]->id.'"><h3 class="card-service__title">'.$subTitle.'</h3></a>
                                             <div class="card-interaction">
                                                    <a href="post_detail.php?qa_id='.$arrQuestionsResult[$i]->id.'"><i class="ti-comments"></i> '.
                                                        $arrQuestionsResult[$i]->answer.' trả lời</a>
                                             </div>
                                        </div></a>
                                </div>';
                            echo $text;  
                        }
                     ?>
                </div>
            </div>
        </div>
    </section>

    <!-- news that mantion -->
     <section class="blog-area area-padding">
        <div class="container">
            <div class="area-headin row">
                <div class="col-md-5 col-xl-4">
                    <h4><u>Tin tức</u><?php if(($c= count($arrNewsResult))==0) echo "  (chưa có tin tức liên quan!)"; ?></h4>
                </div>
            </div>


            <div class="row">
                <?php
                 
                    function printNews($index){
                        global $arrNewsResult;
                        $content=substr($arrNewsResult[$index]->description,0,60)."...";
                        $text='<div class="col-md-6 col-lg-4 col-md-4">
                        <div class="single-blog">
                            <div class="thumb col-md-12">
                                <img class="img-fluid" src="'.$arrNewsResult[$index]->source.'" alt="">
                            </div>
                            <div class="short_details col-md-12">
                                <a class="d-block" href="single-blog.php?id='.$arrNewsResult[$index]->id.'">
                                    <h4>'.($index+1).'.'.$arrNewsResult[$index]->title.'</h4>
                                </a>
                                <p>'.$content.'</p>
                            </div>
                        </div>
                        </div>';
                        return $text;
                    }
                    $j=count($arrNewsResult)>3?3:count($arrNewsResult);
                    $i=0;
                    while($i<$j){
                        echo printNews($i);
                        $i++;
                    }
                 ?>
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