<!DOCTYPE html>
  <html <?php language_attributes(); ?> />
    <head>
      <meta charset="<?php bloginfo( 'charset' ) ?>" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
       <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
       <!-- navbar-fixed-top -->
 <nav class="navbar navbar-default" role="navigation">
   <?php caodung_header(); ?>
   <div class="container_fixed">
 <!-- Brand and toggle get grouped for better mobile display -->
 <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </button>
   <button type="button" class="navbar-toggle collapsed search-collapse" data-toggle="collapse" data-target="#search-collapse" aria-expanded="false">
     <span class="sr-only">Toggle navigation</span>
     <i class="fa fa-search-plus"></i>
   </button>   
 </div>
   <div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;"><?php caodung_navitation("caodung_menu") ?></div>    </div>
  <div class="collapse navbar-collapse" id="search-collapse">
  <form action="" class="navbar-form visible-xs-block">
  <div class="form-group">
 <input type="text" id="s" name="s" placeholder=" Tìm kiếm..." class="form-control" onkeyup="search();">
 </div>
  <button type="submit" class="btn btn-default">Tìm kiếm</button>
 </form>
 </div>
 </nav>
  <div id="wrapper">