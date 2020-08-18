
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Marah | Signin </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
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
		<h1><a href="index.html">Video</a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<?php echo isset($message) ? $message : NULL ?>
			<?php echo form_open('home/attempt_login') ?>
			<?php echo form_hidden('link', $link) ?>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Email" required="" name='email'>
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name='password'>
					<i class="fa fa-lock"></i>
				</div>
				   <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" value='TRUE'><i> </i>Remember Me</label>
					  </a>
						<a class="news-letter " href="<?php echo site_url('home/forgot-password') ?>">
 						 <h4><span class="label label-primary">Forgot Password ?</span></h4>
 					  </a>
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="login">
					</label>
					<p>Do not have an account?</p>
				<a href="<?php echo site_url('home/sign-up')?>" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			<div class="clearfix"> </div>
			<?php echo form_close() ?>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; <?php echo date('Y') ?> Minimal. All Rights Reserved </p>
</div>
<!---->
<!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
	<!--//scrolling js-->
</body>
</html>
