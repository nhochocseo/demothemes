<!DOCTYPE html>
  <html <?php language_attributes(); ?> />
    <head>
      <meta charset="<?php bloginfo( 'charset' ) ?>" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
       <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/bootstrap/dist/css/bootstrap.min.css">
    <link href="<?php echo get_template_directory_uri(); ?>/lib/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/magnific-popup/dist/magnific-popup.css">
    <link href="<?php echo get_template_directory_uri(); ?>/lib/aos%402.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >

     <div class="click_out">
    </div>
    <!--menu mobile -->
    <div id="menu-mobile" class="hidden-md hidden-lg">
        <div class="nav_mobile">
            <div class="logo_nav">
                <img src="images/logo.png" alt="logo">
                <i class="far fa-window-close click_bg" aria-hidden="true" onclick="closeNav()"></i>
            </div>
            <ul>
                <li>
                    <a href="index-2.html">Trang chủ</a>
                </li>
                <li>
                    <a href="about.html">Về chúng tôi</a>
                    <ul>
                        <li>
                            <a href="about.html">Trang About</a>
                        </li>
                        <li>
                            <a href="branding.html">Trang branding</a>
                        </li>
                        <li>
                            <a href="chungnhan.html">Trang chứng nhận</a>
                        </li>
                        <li>
                            <a href="nhamay.html">Trang nhà máy</a>
                        </li>
                        <li>
                            <a href="sanpham.html">Trang About sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="list-product.html">sản phẩm</a>
                    <ul>
                        <li>
                            <a href="list-product.html">Trang tất cả sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="product.html">dự án</a>
                </li>
                <li>
                    <a href="blog.html">blog</a>
                    
                </li>
                <li>
                    <a href="contact.html">liên hệ</a>
                </li>
            </ul>
    
            <ul>
                <li>
                    <a href="#"><i class="fas fa-user-plus"></i> Đăng ký</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                </li>
            </ul>
        </div>
    </div>

    

    <!--end menu mobile -->
    <section class="hd-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <ul class="list-left">
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-mail.png" alt="">
                                info@ctagroup.com.vn
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/icon-phone.png" alt="">
                                0487654321
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 pc">
                    <ul class="list-left fl-right">
                        <li>
                            <span class="color-ht">Hotline :</span>
                            <a href="#">
                                0987654321
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <header class="sticky-top clearfix">
       <div class="container main-menu">
            <div class="open-nav sp" onclick="openNav()">
                <i class="fas fa-bars"></i>
            </div>
            <div class="logo">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo">
                </a>
            </div>
    
            <ul class="menu">
                <li>
                    <a href="index-2.html">Trang chủ</a>
                </li>
                <li>
                    <a href="about.html">Về chúng tôi</a>
                </li>
                <li>
                    <a href="list-product.html">sản phẩm</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="list-product.html">Trang tất cả sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="list-product.html">dự án</a>
                </li>
                <li>
                    <a href="blog.html">blog</a>
                </li>
                <li>
                    <a href="contact.html">liên hệ</a>
                </li>
                <!-- <span class="line-move"></span> -->
            </ul>
    
            <ul class="login">
                <li>
                    <a href="#"  data-toggle="modal" data-target="#dangky">Tài khoản</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#dangnhap">Đăng nhập</a>
                </li>
            </ul>
       </div>
    </header>



    <?php caodung_navitation("caodung_menu") ?>
