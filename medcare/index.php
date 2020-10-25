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

    <!--================LỐI TẮT ĐẶT CÂU HỎI, TƯ VẤN =================-->
    
    <section class="banner-area d-flex align-items-center" style="background-image: url('img/banner/about1.png') !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-5">

                    <h1 style="">Vì tầm vóc Việt Nam<br>
                    chúng tôi luôn ở đây</h1>

                    <p>Đội ngũ bác sĩ nhiệt tình, dày kinh nghiệm sẽ giúp bạn tìm giải quyết mọi vấn đề về sức khỏe, hãy gia nhập cộng đồng của chúng tôi để được chăm sóc, học hỏi và chia sẻ mọi lúc mọi nơi.</p>
                    <!-- <a href="" onclick="click()" class="main_btn">Đặt vấn đề</a> -->
                    <button class="main_btn" id="btn"><a href="hoidap.php" style="color: yellow">Đặt vấn đề</a></button>
                </div>
            </div>
        </div>
    </section>

    <!--================End Home Banner Area =================-->


    <!--================ CÂU HỎI CỦA TÀI KHOẢN =================-->      
    <section class="feature-section">
            <div class="container">
            	<h3 class="your_problem_title">Bạn đã hỏi</h3>
                <div class="row">
                    <?php //lấy ra câu hỏi người dùng dẫ hỏi
                        require 'server/getUserQuestions.php';
                        $c=count($arr2);
                        $c=$c>3?3:$c;
                        for($i=0;$i<$c;$i++){
                        	$content=substr($arr2[$i]->content,0,220)."...";
                            $text=  '<a href="post_detail.php?qa_id='.$arr2[$i]->id.'"><div class="col-md-4">
                                    <div class="card card-feature text-center text-lg-left">
            							
                                        <h3 class="card-feature__title"><span class="card-feature__icon">
                                            <i class="ti-heart-broken"></i>
                                        </span>'.$arr2[$i]->title.'</h3>
                                        <p class="card-feature__subtitle">'.$content.'</p>
            
                                        <div style="text-align: right;">
                                            <a href="post_detail.php?qa_id='.$arr2[$i]->id.'"><i class="ti-comments"></i>'.$arr2[$i]->answer.' trả lời</a>
                                        </div>
                                        
                                    </div>
                                </div></a>';
                                echo $text;
                        }
                    ?>
                </div>
            </div>
    </section>
    <!--================ Feature section end =================-->  

    <!--================ CÂU HỎI CỦA NGƯỜI KHÁC =================-->  

    <div class="service-area area-padding-top">
        <div class="container">
            <div class="area-headin row">
                <div class="col-md-5 col-xl-4">
                    <h3>Mọi người hỏi<br>
                    </h3>
                </div>
                <div class="col-md-7 col-xl-8">
                    <p>Giúp người hơn xây bảy tòa tháp, hãy để lại bất kì những gì bạn biết, có thể bạn sẽ soi sáng nơi nào đó giữa muôn vàn tối tăm của họ</p>
                </div>
            </div>
            <div class="row" >
                 <?php 
                 	require 'server/getQuestions.php';

                	for($i=0;$i<count($arr1);$i++){
                		$name=substr($arr1[$i]->user_name,strrpos($arr1[$i]->user_name," "));
                		$content=substr($arr1[$i]->content,0,190)."...";
                		$text= '<div class="col-md-6 col-lg-4">
				                    <a href="post_detail.php?qa_id='.$arr1[$i]->id.'"><div class="card-service text-center text-lg-left mb-4 mb-lg-0" style="height: 370px;    background: #f8f9fa;">
				                        <span class="card-service__icon" style="font-weight:bold;">'.$name.'</span>
				                        <p><a class="user_email" style="font-weight:bold;" href="mailto:'.$arr1[$i]->email.'">'.$arr1[$i]->email.'</a></p>
				                         <a href="post_detail.php?qa_id='.$arr1[$i]->id.'"><h3 class="card-service__title">'.$arr1[$i]->title.'</h3></a>
				                        <p class="card-service__subtitle">'.$content.'</p>
				                         <div class="card-interaction">
				                                <a href="post_detail.php?qa_id='.$arr1[$i]->id.'"><i class="ti-comments"></i> '.
				                            		$arr1[$i]->answer.' trả lời</a>
				                         </div>
				                    </div></a>
		                	</div>';
		                echo $text;	 
                	}
                 ?>
            </div>
        </div>
    </div>    
  

    <!--================ DANH SÁCH BÁC SĨ =================-->  


    <section class="team-area area-padding" style="margin-top: 20px;">
        <div class="container">
            <div class="area-headin row">
                <div class="col-md-8 col-xl-6">
                    <h3>Sức khỏe là vàng<br>
                    </h3>
                </div>
                <div class="col-md-4 col-xl-6">
                    <p style="font-size: 14px">Chúng tôi không biết bạn là ai nhưng khi bạn đã ở đây, tôi biết chúng ta có cùng 1 kẻ thù (ảnh minh họa)</p>
                </div>
            </div>

            <div class="row">
                <?php 
                    require "server/getDoctor.php";

                    for($i=0;$i<3;$i++)
                    {   
                        $text='<div class="col-md-6 col-lg-4 col-md-4">
                        <div class="single-blog">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="img/team/'.($i+1).'.jpg" alt="">
                            </div>
                            <div class="short_details">
                                <a class="d-block">
                                     <h3>'.$arr[$i]->doctor_degree_name.': '. $arr[$i]->user_name.'</h3>
                                </a>
                                <p>Chuyên khoa: '.$arr[$i]->doctor_degree_major.'<br/> Điện thoại: <span style="color: brown"> '.$arr[$i]->phone.'</span></p>
                            </div>
                            <div class="team-footer d-flex justify-content-between" style="margin-top:-25px;">
                                  <p>Email: <a class="user_email" href="mailto:'.$arr[$i]->email.'">'.$arr[$i]->email.'</a></p>
                                </div> 
                            </div>
                        </div>';
                        echo $text;
                    }  
                 ?>    
                
            </div>

        </div>
    </section>
    
	 <!--================ TIN TỨC =================-->

    <section class="blog-area area-padding">
        <div class="container">
            <div class="area-headin row">
                <div class="col-md-5 col-xl-4">
                    <h3>Tin tức</h3>
                </div>
            </div>


            <div class="row">
                <?php 

                	require "server/getNews.php";

                	function printNews($index){
                		global $arrNew;
                        $content=substr($arrNew[$index]->description,0,70)."...";
                		$text='<div class="col-md-6 col-lg-4 col-md-4">
	                    <div class="single-blog">
	                        <div class="thumb">
	                            <img class="img-fluid" src="'.$arrNew[$index]->source.'" alt="">
	                        </div>
	                        <div class="short_details">
	                            <a class="d-block" href="single-blog.php?id='.$arrNew[$index]->id.'">
	                                <h4>'.$arrNew[$index]->title.'</h4>
	                            </a>
                                <p style="margin-top:-10px;">'.$content.'</p>
	                        </div>
	                    </div>
	                	</div>';
	                	return $text;
                	}
                	
                	$i=0;
                	while($i<3){
                		echo printNews($i);
                		$i+=1;
                	}
                 ?>
            </div>
        </div>
    </section>

    <!-- ================ LIÊN HỆ ================= -->  
     <section class="hotline-area text-center area-padding" style="margin-top: 15px;">
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
    <!-- ================ Hotline Area End ================= -->  


<!-- ====================================FOOTER -->

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