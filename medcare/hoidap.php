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
    <title>Hỏi Đáp</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap3.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/styleCustom.css">
     <link rel="stylesheet" href="css/hoidapCustom.css">
     <link rel="stylesheet" href="css/font.css">
</head>
 <script  language="javascript">
  function show(){

     var a = ['answer0','answer1','answer2','answer3','answer4'];
     
     for (var i = 0; i < a.length; i++) {

         var c = document.getElementById(a[i]); 

            if(c.style.display=="none")
               c.style.display="block";
            else
             if(c.style.display=="block")
                 c.style.display="none";
    }
 }

 </script>
<body>

    <!--================Header Menu Area =================-->
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
    <!--================Header Menu Area =================-->


    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container" style="margin-top: 50px">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Hỏi Đáp</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    
<section class="appointment-area area-padding" >
        <div class="container">

            <div class="appointment-inner">
                <div class="row">
                    <div class="col-sm-12 col-lg-5 offset-lg-1" >
                        <h3 style="margin-bottom: 30px"><?php 
                            if(isset($_GET['QAadded'])){
                                echo "Liên quan nhất";
                            }
                            else echo "Bạn hỏi gần đây"; 
                            //important
                            require 'server/getUserQuestions.php';

                            ?></h3>

                        <!-- content main -->
                        <div class="" id="accordionExample">
                        <?php 
                            if(isset($_GET['QAadded'])||isset($_GET['QAadded1'])) {
                                    $arrNewsResult= array();
                                    $arrAdviceResult= array();
                                    $arrQuestionsResult= array();
                                    require 'server/getQuestionResult.php';
                                if(isset($_GET['QAadded']))  {                              
          
                                    //recent question
                                    $c= count($arr2)-1;
                                    $date=substr($arr2[$c]->create_date,0,strrpos($arr2[$c]->create_date,"/") );
                                    

                                    $target = '';
                                    $target .= is_null($cate_name)?"":'<span>'.ucfirst($cate_name).'</span> ';
                                    $target .= is_null($topic)?"":'<span>'.ucfirst($topic).'</span> ';
                                    $target .= is_null($climate)?"":'<span>'.ucfirst($climate).'</span> ';
                                    $target .= is_null($patience)?"":'<span>'.ucfirst($patience).'</span> ';

                                    $text ='
                                        <a href="post_detail.php?qa_id='.$arr2[$c]->id.' method="GET">
                                            <div class="card1" >
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <span>
                                                            <span style="color:blue">+'.$arr2[$c]->title.'</span>--<span style="color:#6c5b7b">'.$date.'</span> '.' <span style="color:gray"><span style="color:brown"><i class="ti-comments"></i> '.$arr2[$c]->answer.'</span>
                                                        </span>

                                                    </h5>
                                                </div> 
                                                
                                            </div>
                                        </a>';
                                        $text1 ='<div class="object">'.$target.'</div>';
                                    echo $text;
                                    echo $text1;
                                }
                                //is going
                             else {
                                    $text ='<div class="card1" >
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <span>
                                                            <span style="color:blue">Câu hỏi bị trùng !!</span>
                                                        </span>
                                                    </h5>
                                                </div> 
                                            </div>';
                                    echo $text;
                             }

                                $c= count($arrQuestionsResult);//->getQuestionResult
                                $text =' <h4>-----Thảo luận ('.$c.')-----</h4>'; 
                                //chuyển hướng trang đến post_detal with id category
                                echo $text;
                                    //php
                                    $c= count($arrQuestionsResult);
                                   // echo  $c.'</br>';
                                    $c= $c > 5 ? 5 : $c;

                                    for($i=0;$i<$c;$i++) {
                                        $date=substr($arrQuestionsResult[$i]->create_date,0,strrpos($arrQuestionsResult[$i]->create_date,"/"));
                                        $content=substr($arrQuestionsResult[$i]->title,0,42)."...";
                                        $text ='
                                            <a href="post_detail.php?qa_id='.$arrQuestionsResult[$i]->id.' method="GET">
                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <span>
                                                            '.($i+1).'. '.$content.'-<span style="color:#6c5b7b">'.$date.'</span> '.' <span style="color:gray"><i class="ti-comments"></i> '.$arrQuestionsResult[$i]->answer.'</span>
                                                        </span>
                                                    </h5>
                                                </div> 
                                            </div></a>';
                                        echo $text;
                                    }
                                //php
                                $c= count($arrAdviceResult);
                                $text =' <h4>-----Thông tin ('.$c.')-----</h4>';       //chuyển hướng tới single-blog.php  whit idAdvance(lời khuyên)
                                echo $text;
                                        
                                        //echo  $c.'</br>';
                                        $c= $c > 4 ? 4 : $c;

                                        for($i=0;$i<$c;$i++) {
                                            $content=substr($arrAdviceResult[$i]->title,0,45)."...";
                                            $text ='
                                                <a href="single-blog.php?tv_id='.$arrAdviceResult[$i]->id.' method="GET">
                                                <div class="card">
                                                    <div class="card-header" id="headingFive">
                                                        <h5 class="mb-0">
                                                            <span>
                                                                '.($i+1).'. '.$content.'
                                                            </span>
                                                        </h5>
                                                    </div> 
                                                </div></a>';
                                            echo $text;
                                        }
                                    //php             
                                $c= count($arrNewsResult);
                                $text =' <h4>-----Tin tức ('.$c.')-----</h4>'; //chuyển tới trang single-blog.php (with id tin tức)      
                                echo $text;
                               // echo  $c.'</br>';
                                   $c= $c > 4 ? 4 : $c;

                                    for($i=0;$i<$c;$i++) {
                                        $content=substr($arrNewsResult[$i]->title,0,45)."...";
                                        $text ='
                                            <a href="single-blog.php?id='.$arrNewsResult[$i]->id.' method="GET">
                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <h5 class="mb-0">
                                                        <span>
                                                            '.($i+1).'. '.$content.'
                                                        </span>
                                                    </h5>
                                                </div> 
                                            </div></a>';
                                        echo $text;
                                    }
                                }
                            else if(isset($_SESSION['user_id']))  {   
                                //show user's qa only

                                $c=count($arr2);
                                $c=$c>8?8:$c;
                                for($i=0;$i<$c;$i++){
                                    $date=substr($arr2[$i]->create_date,0,strrpos($arr2[$i]->create_date,"/"));
                                    $content=substr($arr2[$i]->title,0,45)."...";
                                    $text ='
                                        <a href="post_detail.php?qa_id='.$arr2[$i]->id.' method="GET">
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <h5 class="mb-0">
                                                    <span>
                                                        '.($i+2).'. '.$content.'-<span style="color:#6c5b7b">'.$date.'</span> '.' <span style="color:gray"><i class="ti-comments"></i> '.$arr2[$i]->answer.'</span>
                                                    </span>
                                                </h5>
                                            </div> 
                                        </div></a>';
                                    echo $text;
                                }
                                }
                            ?>
                    </div>
                </div>
                                
                    <div class="col-lg-5" >
                        <div class="appointment-form">
                            <h3>Vấn đề của bạn</h3>
                            <?php
                            $sql = "SELECT * FROM categoty ORDER BY category_name ASC";
                              $query = mysqli_query($connect,$sql);
                               ?>
                            <form action="server/addQuestion.php" method="GET">
                                <div class="form-group">
                                    <label style="color: brown">Câu hỏi <span style="color: red">*</span></label>
                                     <select  name="key" class="col-sm-6 mb-3 mb-sm-0" selected="selected" style=" border: 2px solid black;border-radius: 10px;">

                             <?php 
                               while ($row = mysqli_fetch_array($query)) {?>
                                   <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
                             <?php }?>
                    </select>

                                </div>
                                <div class="form-group" style="margin-top: -30px">
                                    <label style="color: brown">Chi tiết triệu chứng/biểu hiện bệnh</label>
                                    <textarea style=" border: 2px solid black;border-radius: 10px;" name="content" cols="20" rows="7"  placeholder="Mô tả chi tiết"></textarea>
                                </div>
                                <input type="submit" class="main_btn" style="margin-top: -15px">
                            </form>
                        </div>

                    </div>
                </div>

            </div>

<!-- $arr1 & $arr2 is global -> getQuestionResult-->
<!-- $arrmain is global ->getCommentedPost, lấy dữ liệu từ bảng qa with class qa2-->
<!-- $arr lấy dữ liệu từ bảng news -->
<!-- $arrNewsResult= array() lay du lieu tu bang news;
    $arrSymptomsResult= array() lay du lieu tu bang tu van;
    $arrQuestionsResult= array(); lay du lieu tu bang qa -->
        </div>
    </section>

     
<!--================ Service section start =================-->  

    <div class="service-area area-padding-top">
        <div class="container"  style="margin-bottom: 25px;">
            <div class="area-headin row">
                <div class="col-md-5 col-xl-4">
                    <h3>Bạn đã quan tâm</h3>
                </div>
            </div>
            <div class="row">

                 <?php 
                    require 'server/getCommentedPost.php';//post_detal
                    $c1=count($arrMain);
                    for($i=0;$i<$c1;$i++){
                        $name=substr($arrMain[$i]->user_name,strrpos($arrMain[$i]->user_name," "));
                        $content=substr($arrMain[$i]->content,0,150)."...";
                        $text= '<div class="col-md-6 col-lg-4" >
                                    <a href="post_detail.php?qa_id='.$arrMain[$i]->id.'"><div class="card-service text-center text-lg-left mb-4 mb-lg-0" style="height: 330px;">
                                        <span class="card-service__icon">'.$name.'</span>
                                        <p><a class="user_email" href="mailto:'.$arrMain[$i]->email.'">'.$arrMain[$i]->email.'</a></p>
                                         <a href="post_detail.php?qa_id='.$arrMain[$i]->id.'"><h3 class="card-service__title">'.$arrMain[$i]->title.'</h3></a>
                                        <p class="card-service__subtitle">'.$content.'</p>
                                         <div class="card-interaction">
                                                <a href="post_detail.php?qa_id='.$arrMain[$i]->id.'"><i class="ti-comments"></i> '.
                                                    $arrMain[$i]->answer.' trả lời</a>
                                         </div>
                                    </div></a>
                            </div>';
                        echo $text; 
                    }
                 ?>
            </div>
        </div>
    </div>    
    <!--================ Service section end =================-->    



  
    <!--================ appointment Area End =================-->
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
    <div class="footer" style="text-align: center; margin-bottom: 20px;">
        <hr>
         Dịch vụ được hoàn hiện bởi | <a href="#" target="_blank">Lê Văn Tự</a>
    </div>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              
    <!-- End footer Area -->






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
    <script>
        <?php if(isset($_GET['QAadded'])): ?>
            alert('Đặt câu hỏi thành công');
        <?php elseif(isset($_GET['QAadded1'])): ?>
            alert('Câu hỏi này đã tồn tại, hãy xem câu trả lời!');
        <?php elseif(isset($_GET['NotAdd1'])||isset($_GET['NotAdd2'])): ?>
            alert('Không thể đặt câu hỏi cho cộng đồng, vui lòng xác định lại vấn đề của bạn!');
        <?php endif; ?>
    </script>
</body>
</html>