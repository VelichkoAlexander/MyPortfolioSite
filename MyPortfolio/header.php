 
<?php ob_start();?>

 <?php
	$blog_title = get_bloginfo('name');
	$blog_description = get_bloginfo('description');
	$options = get_option( 'sample_theme_options' );
	

?>
<!DOCTYPE html>
<html lang="ru">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Yandex -->
  <meta name='yandex-verification' content='605298ddaf5b70d3' />
  <!-- End Yandex -->
  <link rel="icon" type="image/png" href="<? echo( get_template_directory_uri()); ?>/images/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<? echo( get_template_directory_uri()); ?>/images/favicon/favicon-16x16.png" sizes="16x16">
  <? wp_head(); ?>
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 8]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
   <body>
   <div id="loader">
      <div id="loaderInner"><i class="fa fa-spinner fa-pulse fa-4x"></i></div>
    </div>
    <!--Header-->
    <header id="home" data-speed="2" class="main_head">
      <nav role="navigation" class="navbar navbar-default">
        <div class="container">
          <!-- LOGO-->
            <a href="#" class="navbar-brand logo_container">
             <img src="<? echo( get_template_directory_uri()); ?>/images/header/avatar.png" alt="header__person-photo">
              <h1 class="header__person-name"><? dynamic_sidebar('logo_1') ?></h1>
			</a>
          <!-- MOBILE MENU-->
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>
          <!-- DESKTOP MENU-->
          <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right menu">
              <li><a href="#about">Обо мне</a></li>
              <li><a href="#portfolio">Портфолио</a></li>
              <li><a href="#mailMe">Связаться</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse-->
        </div>
      </nav>
    </header>
    <div class="header__intro">
      <div class="header__intro-inner">
         <h2><? echo($options['sometext1']); ?></h2>
         <p><? echo($options['sometext2']); ?></p>
      </div>
    </div><a href="#about" class="header__scroll"><i class="fa fa-angle-down fa-2x"></i></a>
    <div id="bgndVideo" data-property="{videoURL:'https://youtu.be/921Puvb0x6Q', containment:'header',	autoPlay:true,	mute:true, startAt:0, opacity:1, showControls : false}" class="player"></div>
    <!--End header-->

       