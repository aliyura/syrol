<?php
session_start();
include('include/config.php');
$query=mysqli_query($con,"select * from courses where courseType='short' and status ='AC'");
 $cnt=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Join for World Class Software Programs and Developement Studies</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Syrol Courses, Syrol Technologies, Study with Syrol"/>
<meta name="description" content="We have more in house and industry experts from China, India to take you foward with advanced technologies.">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="images/logo.PNG">  
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="css/simple-line-icons.css" rel="stylesheet" />
    
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
    
    
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
                      <h1><span>O</span>ur Programs<span class="slogan">"Learn from your Home"</span></h1>
                </div>   
			</div> 
		</div>
	</div>
<!-- //banner -->	
<!-- services -->
	<div class="courses">
		<div class="container"> 	
    
			<div class="sy_agile_team_grid">
				<div class="sy_agile_team_grid_left">
					<p>01</p>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
				</div>
				<div class="sy_agile_team_grid_right">
					<h3>Our Programs</h3>
					<p>We have more in house and industry experts from China, India, and Singapore, enroll today, to learn from the world-class industry experts.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
          
			<div class="agileinfo_services_grids">
			<?php 
                if(mysqli_num_rows($query)>0){
				  while($row=mysqli_fetch_array($query))
				  {
			  ?>	
				<div class="col-md-4 sy_agile_services_grid">
					<div class="agile_services_grid1" style="background-image: url(admin/courseimages/<?php echo $row['id'];?>/<?php echo $row['courseImage'];?>);background-repeat: no-repeat;background-size: cover;"  code="<?php echo $row['courseCode'];?>">
						<h3>Starting on</h3>
						<div class="agile_services_grid1_sub">
							<p><?php echo htmlentities(date('d M Y',strtotime($row['courseStartDate'])));?></p>
						</div>
						<h4><span>NGN </span><?php echo number_format($row['coursePrice']);?></h4>
					</div>
					<div class="agileits_syrol_services_grid1">
						<div class="sy_agileits_services_grid1">
							<div class="sy_agileits_services_grid1l">
								<img src="admin/courseimages/<?php echo $row['id'];?>/<?php echo htmlentities($row['courseInstructorImage']);?>" alt=" " class="img-responsive" />
							</div>
							<div class="sy_agileits_services_grid1r">
								<ul>
                                    <li><a href="preview?cid=<?php echo $row['courseCode'];?>"><button type="button">Apply Now</button></a></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
						<h4><a href="preview?cid=<?php echo $row['courseCode'];?>"><?php echo $row['courseName'];?></a></h4>
						<p><?php echo $row['courseShortDescription'];?></p>
					</div>
				</div>

				  <?php 
                    }
                  }else{
                      
                         echo('
                        <div class="info-section">
                          <img src="images/failedIcon.png" class="check">
                          <h2>No Program Available!</h2>
                        </div>
                      ');  
                      
                  }
                ?>	
				<div class="clearfix"> </div>
            </div>
            
		</div>
	</div>
<!-- //services -->
<!-- services1 -->
<!-- //services1 -->
<!-- bootstrap-pop-up -->
	<a href="#" data-toggle="modal" data-target="#myModal" code="ppfb01" id="openModel"></a>
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="padding-bottom:2em">
				<section>
					<div class="modal-body">
                        <strong id="modelTitle" style="margin-top:1em">Syrol Technologies</strong>
						<p id="modelBody">Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->
<!-- footer -->
<?php require('layouts/footer.php')?>
<!-- //footer -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="js/model-preview.js"></script>
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
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>