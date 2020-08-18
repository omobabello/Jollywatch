
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Restore Password </title>
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

<!-- Mainly scripts -->
<script src="<?php echo assets_url('js/jquery.metisMenu.js') ?>"></script>
<script src="<?php echo assets_url('js/jquery.slimscroll.min.js') ?>"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo assets_url('css/custom.css') ?>" rel="stylesheet">
<script src="<?php echo assets_url('js/custom.js') ?>"></script>
<script src="<?php echo assets_url('js/screenfull.js') ?>"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});



		});
		</script>

<!----->

</head>
<body>
<div id="wrapper">
     <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.html">Minimal</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>
           </div>
            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		     <div class="banner">
		    	<h2>
				<a href="<?php echo site_url()?>">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Forms</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">

<div class="grid-form1">
<h3 id="forms-inline">Restore Password</h3>
<?php echo validation_errors("<p class='alert alert-danger'>", "</p>"); ?>
<form class="form-inline" method='post' action="<?php echo site_url('home/restore') ?>">
	<?php echo form_hidden('hash', $hash);
				echo form_hidden('user', $user);
	?>
  <div class="form-group">
    <label for="exampleInputEmail2">New Password</label>
    <input type="password" class="form-control" id="exampleInputEmail2" placeholder="Password" name='password'>
  </div>
	<div class="form-group">
    <label for="exampleInputEmail2">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputEmail2" placeholder="Confrim Password" name='passconf'>
  </div>
  <button type="submit" class="btn btn-success btn-send">Renew Password</button>
</form>
</div>
 	</div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy; <?php echo date('Y') ?> Minimal. All Rights Reserved </p>
 </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     <!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
	<!--//scrolling js-->
<!---->

</body>
</html>
