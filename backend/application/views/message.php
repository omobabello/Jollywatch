<!DOCTYPE HTML>
<html>
<head>
<title>Minimal Dashboard | Not Activated</title>
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



</head>
<body>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
			<div class="blank-page">
	        	<p>
              <?php echo $message ?> <hr/>

              <center><a href="<?php echo $link ?>" class="btn btn-info"><?php echo $link_text ?></a></center>
            </p>
	      </div>
	 </div>
		</div>
		</div>

<!---->
<!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
	<!--//scrolling js-->
</body>
</html>
