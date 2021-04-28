<!DOCTYPE html>
<html lang="en">
<head>
<title>Page not Found</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
    

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="images/logo.PNG">
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<style>
 .info-section{
	  text-align:center;
	  padding:2em;
	  min-height:300px;
	  margin-top:2em;
 }
 .check{
	 width:60px;
 }
</style>    
</head>
<body>
<!-- banner -->
    	
<div class="banner1">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1><a class="navbar-brand" href="https://syrol.org"><span>S</span>yrol</a></h1>
			</div>
            <?php require('layouts/header.php')?>
        </nav>
		<div class="wthree_banner1_info">
			<div class="container">
				<h3><span>P</span>age not Found</h3>
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
	<div class="courses">
		<div class="container">
            <div class="info-section">
              <img src="images/failedIcon.png" class="check">
              <h2>Page not Found</h2>
                <p>Link you are trying to access is changed or does not exist</p>
                <a href ="https://www.syrol.org/">Back to Home</a>
             </div>
        </div>
	</div>
<!-- //mail -->
<!-- footer -->
<?php require('layouts/footer.php')?>
<!-- //footer -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="js/ayral.js"></script>
<script type="text/javascript" src="js/sign.service.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>