<html>
	<head>
		<title><?php echo $title ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="images/pageicon.png" />
		<link href="<?php echo assets_url('css/style.css') ?>" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Videostube iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<script src="<?php echo assets_url('js/custom.js')?>"></script>
	</head>
  <body>
	<!----start-wrap---->
	<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<!----start-Logo---->
			<div class="logo">
				<a href="<?php echo site_url() ?>"><img src="<?php echo assets_url('images/logo.png') ?>" title="logo" id="logo"/></a>
			</div>
			<!----End-Logo---->
			<!----start-top-nav---->
			<div class="top-nav">
        <?php $this->load->library('session') ?>
        <?php if ($this->session->has_userdata('logged_in')) : ?>
          <ul>
  					<span><?php echo $this->session->email ?></span>
  					<li><a href="<?php echo site_url('home/logout') ?>">Logout</a></li>
  				</ul>
      <?php else : ?>
            <ul>
    					<li><a href="<?php echo site_url('home/sign-in') ?>">Sign In</a></li>
    					<li><a href="<?php echo site_url('home/sign-up') ?>">Sign Up</a></li>
    				</ul>
      <?php endif; ?>
			</div>
			<div class="clear"> </div>
			<!----End-top-nav---->
		</div>
      <div class="clear"> </div>
      <div class="content">
  		<div class="categories">
  			<div class="categories-list">
  				<div class="content-sidebar">
  		    		<h4><img src="images/fi.png" alt="" />Categories</h4>
  						<ul>
  							<li><a href="<?php echo site_url() ?>">Home</a></li>
  							<li><a href="<?php echo site_url('movies') ?>">Movies</a></li>
  							<li><a href="<?php echo site_url('series')?>">Series</a></li>
  							<li><a href="<?php echo site_url('home/skits') ?>">Skits</a></li>
                <?php if ($this->session->has_userdata('logged_in')) : ?>
    							<li><a href="#">Favorites</a></li>
    							<li><a href="#">History</a></li>
                <?php endif; ?>
  						</ul>
  		    	</div>
  			</div>
