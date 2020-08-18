<html>
<head>
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Trendy Signup Forms Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="<?php echo assets_url('join/css/style.css') ?>" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,700,800' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

<div class="login-form-1">
      <a href="<?php echo site_url()?>"><div class="close"> </div></a>
					<div class="head">
					</div>
					<div class="head-info">
						<h1>SIGN IN</h1>
						<h2>Welcome back! Nice to see you</h2>
					</div>
          <?php echo isset($message) ? $message : NULL ?>
				<?php echo form_open('home/signin') ?>
					<li>
						<input type="text" class="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Email" ><a href="#" class=" icon mail"></a>
					</li>
					<li>
						<input type="password" name="password" value="<?php echo set_value('password') ?>" placeholder="Password"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
								<input type="submit" value="SIGN IN" >
							<div class="clear"> </div>
					</div>
				<?php echo form_close() ?>
				<div class="social-icons">
							<div class="but-bottom">
							<a href="#" class="account"><p>Forgot your password?</p></a>
							<a href="<?php echo site_url('home/sign-up')?>" class="trouble"><p>Create new account?</p></a><div class="clear"> </div></div>
							<div class="clear"> </div>
				</div>
			</div>
 <!--/SIGN IN-->
 <div class="copy-rights">
					<p>Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a> </p>
			</div>

</body>
</html>
