<html>
<head>
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="<?php echo assets_url('css/bootstrap.min.css') ?>" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="<?php echo assets_url('css/dashboard.css') ?>" rel="stylesheet">
<!-- Custom Theme files -->
<link href="<?php echo assets_url('css/style.css') ?>" rel='stylesheet' type='text/css' media="all" />
<script src="<?php echo assets_url('js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo assets_url('js/custom.js') ?>"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
<body>
<?php $this->load->library('session'); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><h1><img src="<?php echo assets_url('images/logo.png') ?>" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
    			<div class="top-search">
            <?php echo form_open('home/search', array('class' => 'navbar-form navbar-right')) ?>
    					<input type="text" class="form-control" placeholder="Search..." id='search' name='search'>
    					<input type="submit" value=" ">
              <?php echo form_close() ?>
    			</div>
    			<div class="header-top-right">
            <?php if ($this->session->has_userdata('logged_in')):?>
                          <div class="signin">
                            <?php echo $this->session->email ?>
                          </div>
                          <div class="signin">
                            <a href="<?php echo site_url('home/logout')?>" class="play-icon popup-with-zoom-anim">Logout</a>
                          </div>
            <?php else :  ?>
                          <div class="signin">
                            <a href="<?php echo site_url('home/sign-up')?>" class="play-icon popup-with-zoom-anim">Sign Up</a>
                          </div>
                          <div class="signin">
                            <a href="<?php echo site_url('home/sign-in')?>" class="play-icon popup-with-zoom-anim">Sign In</a>
                          </div>
            <?php endif; ?>
				<div class="clearfix"> </div>
			</div>
        </div>
		        <div class="clearfix"> </div>
      </div>
    </nav>
<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
      <div class="t-menu">MENU</div>
      <div class="t-img">
        <img src="<?php echo assets_url('images/lines.png') ?>" alt="" />
      </div>
      <div class="clearfix"> </div>
    </div>
      <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">
        <li class="active"><a href="<?php echo site_url() ?>" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Categories<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
          <ul class="cl-effect-2">
            <?php if ($is_movie) : ?>
              <li><a href="<?php echo site_url('home/movies')?>">Movies</a></li>
            <?php endif; ?>
            <?php if ($is_series) : ?>
              <li><a href="<?php echo site_url('home/series')?>">Series</a></li>
            <?php endif; ?>
            <?php if ($is_skits) : ?>
              <li><a href="<?php echo site_url('home/skits')?>">Skits</a></li>
            <?php endif; ?>
          </ul>
          <!-- script-for-menu -->
          <script>
            $( "li a.menu1" ).click(function() {
            $( "ul.cl-effect-2" ).slideToggle( 300, function() {
            // Animation complete.
            });
            });
          </script>
        <?php if ($this->session->has_userdata('logged_in')) :
        ?>
        <li><a href="<?php echo site_url("home/favorites/{$this->session->subs}") ?>" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Favourites</a></li>
        <li><a href="<?php echo site_url("home/history/{$this->session->subs}") ?>" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
      <?php endif; ?>
      </ul>
        <div class="side-bottom">
          <div class="side-bottom-icons">
            <ul class="nav2">
              <li><a href="#" class="facebook"> </a></li>
              <li><a href="#" class="facebook twitter"> </a></li>
              <li><a href="#" class="facebook chrome"> </a></li>
              <li><a href="#" class="facebook dribbble"> </a></li>
            </ul>
          </div>
          <div class="copyright">
            <p>Copyright © 2015 My Play. All Rights Reserved | Design by Omoba</p>
          </div>
        </div>
  </div>
</div>
