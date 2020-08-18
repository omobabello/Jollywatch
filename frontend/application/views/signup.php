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
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});
});
</script>
 <!--SIGN UP-->
		<div class="login-form">
			<a href="<?php echo site_url()?>"><div class="close"> </div></a>
					<div class="head">
					</div>
					<div class="head-info">
						<h1>SIGN UP</h1>
						<h2>Enter your details and lets get started</h2>
					</div>
				<?php echo isset($message) ? $message : NULL ?>
				<?php echo validation_errors("<p class='danger'>","</p>")?>
				<?php echo form_open('home/signup') ?>
					<li>
						<input type="text" class="text" name="phone" value="<?php echo set_value('phone')?>" placeholder="Phone Number" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="text" class="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Email" ><a href="#" class=" icon mail"></a>
					</li>
					<li>
						<select name='package' class="text">
								<option value="0">Select Package</option>
								<option value="1">Movies Only</option>
								<option value="2">Series Only</option>
								<option value="3">Skits Only</option>
								<option value="4">Movies and Series</option>
								<option value="5">Movies and Skits</option>
								<option value="6">Skits and Series</option>
								<option value="7">Movies, Series and Skits</option>
							</select>
					</li>
					<li>
						<input type="password" name="password" placeholder="Password"><a href="#" class=" icon lock"></a>
					</li>
					<li>
						<input type="password" name="passconf" placeholder="Confirm Password"><a href="#" class=" icon lock"></a>
					</li>

					<div class="p-container">
								<input type="submit" value="SIGN UP" >
							<div class="clear"> </div>
					</div>
				<?php echo form_close() ?>
			</div>
			<div class="copy-rights">
					<p>Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a> </p>
			</div>
</body>
</html>
