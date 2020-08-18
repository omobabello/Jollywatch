<!DOCTYPE HTML>
<html>
<head>
<title>Minimal Dashboard | Not Paid</title>
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
               <h1> <a class="navbar-brand" href="<?php echo site_url('home/dashboard') ?>">Minimal</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>
            <div class="clearfix"> </div>
           </div>


            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">

		    		<li class="dropdown at-drop">
		              <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">1</span></a>
		              <ul class="dropdown-menu menu1 " role="menu">
		                <li>
                      <a href="#">
		                	<div class="user-new">
		                	<p>You have not paid for this year</p>
		                	<span>40 seconds ago</span>
		                	</div>
		                	<div class="user-new-left">
                        <i class="fa fa-info"></i>
		                	</div>
		                	<div class="clearfix"> </div>
		                	</a>
                    </li>
		              </ul>
		            </li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix"></div>
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                  <li>
                      <a href="<?php echo site_url('home/dashboard') ?>" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                  </li>
                  <li>
                      <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">My Videos</span><span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="#" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>My Videos</a></li>
                          <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Pending Videos</a></li>
                          <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Typography</a></li>
                      </ul>
                  </li>
                  <li>
                     <a href="#" class="hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Account</span><span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li><a href="#"> <i class="fa fa-info-circle nav_icon"></i>Summary</a></li>
                         <li><a href="#"><i class="fa fa-question-circle nav_icon"></i>Monthly Breakdown</a></li>
                         <li><a href="#"><i class="fa fa-file-o nav_icon"></i>Annual Breakdown</a></li>
                         <li><a href="#"><i class="fa fa-file-o nav_icon"></i>Per Video</a></li>
                    </ul>
                 </li>
              </ul>
          </div>
        </div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		     <div class="banner">
		    	<h2>
				<a href="<?php echo site_url('home/dashboard') ?>">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Not Paid</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">

			<div class="blank-page">
	        	<p>
							You currently are not subscribed to any package or your current package has expired. Choose from one of the packages below to proceed <hr/>
            </p>
						<a href="<?php echo site_url('home/package/1') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package one</li>
									<li><a href="javascript:void(0)">10 movies</a></li>
									<li><a href="javascript:void(0)">1.5gb each</a></li>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/2') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package two</li>
									<li><a href="javascript:void(0)">10 movies</a></li>
									<li><a href="javascript:void(0)">1.5gb each</a></li>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/3') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package three</li>
												<li><a href="javascript:void(0)">10 movies</a></li>
												<li><a href="javascript:void(0)">1.5gb each</a></li>
										</ul>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/4') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package fout</li>
									<li><a href="javascript:void(0)">10 movies</a></li>
									<li><a href="javascript:void(0)">1.5gb each</a></li>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/5') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package five</li>
									<li><a href="javascript:void(0)">10 movies</a></li>
									<li><a href="javascript:void(0)">1.5gb each</a></li>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/6') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package six</li>
												<li><a href="javascript:void(0)">10 movies</a></li>
												<li><a href="javascript:void(0)">1.5gb each</a></li>
										</ul>
							</ul>
						</div>
					</a>
					<a href="<?php echo site_url('home/package/7') ?>">
						<div class='col-md-3 content-box'>
							<ul>
									<li><span>Package seven</li>
												<li><a href="javascript:void(0)">10 movies</a></li>
												<li><a href="javascript:void(0)">1.5gb each</a></li>
										</ul>
							</ul>
						</div>
					</a>
	      </div>
	 </div>


	<!--//faq-->
		<!---->
<div class="copy">
            <p> &copy;<?php echo date('Y') ?> Minimal. All Rights Reserved </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>

<!---->
<!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
	<!--//scrolling js-->
</body>
</html>
