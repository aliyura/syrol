<?php
session_start();
include('include/config.php');
$name="Unknown";
$courseName="Unknown";
$certificateLink="Unknown";
$title="Unknown";

if(isset($_GET['sid'])){
    
     $reg_id=strtolower($_GET['sid']);
     $query=mysqli_query($con,"select * from users where lower(reg_id)='$reg_id'");     
     if(mysqli_num_rows($query)>0){
         if($row=mysqli_fetch_array($query))
         {
              $name = ucwords($row['name']);
              $courseName=ucwords($row['courseName']);
              $certificateLink=strtolower($row['certificate_link']);
             
             $title=ucwords($name.'\'s Certificate for '.$courseName.' with Syrol Academy');
         }
    }
}
else{
    ob_start();
    header('Location:certificates');
    ob_end_flush();
    die();
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo($title);?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Syrol, Syrol Technologies, Software Engineer at Syrol, Syrol Courses, Software Development, Afrcian Software Company, Software Company in NIgeria, Software Company in Africa, Software Company in Kano"/>
<meta name="description" content="Help people learn new skills, advance their careers, and explore their hobbies by sharing your knowledge.">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/simple-line-icons.css" rel="stylesheet" />
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
    
<!-- js -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="images/logo.png">
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
 <link href="css/simple-line-icons.css" rel="stylesheet" />
    
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171599740-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171599740-1');
</script>
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
				  <div class="full-page-title">
                      <h1><span>C</span>ertificate<span class="slogan">"<?php echo($name);?>"</span></h1>
                  </div>   
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
	<div class="courses">
		<div class="container">
		  <div class="contact-box">
    <div class="container">
			
                
      <div class="get-in stayleft fullscreen">
		<div class="sidebar-widget-title">
			<h4> <span>Certificate</span></h4>
		</div>
      <div class="row message fullscreen search-preview">
         <div class="col-md-8">
            <img src="images/certificate.jpg" class="certificate-view">
          </div>
           <div class="col-md-4">
          <p>The certificate below verifies that <?php echo($name); ?> completed the professional training for <?php echo($courseName); ?> taught by Syrol Academy's team.</p>
          <p><br/></p>   
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-warning">Download</button>
                <button type="button" class="btn btn-danger">Share</button>
            </div>
          </div>
      </div>
      </div>  <!-- Get In Touch -->
    
    </div>
  </div><!-- Contact Box --> 
           
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