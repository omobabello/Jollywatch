
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Marah | Signup </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo assets_url('css/bootstrap.min.css') ?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo assets_url('css/style.css') ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo assets_url('css/font-awesome.css') ?>" rel="stylesheet">
<script src="<?php echo assets_url('js/jquery.min.js') ?>"> </script>
<script src="<?php echo assets_url('js/bootstrap.min.js') ?>"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="<?php echo site_url() ?>">Minimal </a></h1>
		<div class="login-bottom">
			<h2>Register</h2>
			<?php echo  isset($message) ? $message : NULL ?>
			<?php echo form_open('home/register') ?>
			<?php echo validation_errors("<p class='alert alert-danger'>" , "</p>") ?>
			<div class="col-md-12">
				<div class="login-mail">
					<input type="text" placeholder="Business Name" name='name' value="<?php echo set_value('name') ?>" >
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Email" name='email' value="<?php echo set_value('email') ?>" >
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Mobile Number" name='mobile' value="<?php echo set_value('mobile') ?>" >
					<i class="fa fa-phone"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name='password' >
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Confirm password"  name='repass' >
					<i class="fa fa-lock"></i>
				</div>
				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="terms" required><i> </i>I agree with the terms</label>
					 </a>
			</div>
			<div class="col-md-12 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Submit">
					</label>
					<p>Already register</p>
				<a href="signin.html" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php echo form_close() ?>
	</div>
		<!---->
<div class="copy-right">
      <p> &copy; <?php echo date('Y') ?> Minimal. All Rights Reserved </p>
</div>
<!---->
<!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js ')?>'"></script>
	<!--//scrolling js-->
</body>
</html>
