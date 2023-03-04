<?php
session_start();
include('include/config.php');
$title="Send your Application form now";
$description="Joing our Online Training Program";
$price="Not Available";
$date="Not Available";
$tools="Unknown";
$type="none";
$req="user";
$syllabus="https://wa.me/2349065000062";

if(isset($_GET['cid'])){
    
    $type=strtolower($_GET['cid']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo($title)?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Syrol, Syrol Technologies, Software Engineer at Syrol, Syrol Courses, Software Development, Afrcian Software Company, Software Company in NIgeria, Software Company in Africa, Software Company in Kano"/>
<meta name="description" content="<?php echo($description)?>">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
<link href="css/owl.carousel.css" rel="stylesheet" />
<link href="css/owl.transitions.css" rel="stylesheet" />
<link href="css/owl.theme.min.css" rel="stylesheet" />
<link href="css/simple-line-icons.css" rel="stylesheet" />
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171599740-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171599740-1');
</script>   
<!-- js -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="images/logo.png">
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet"></head>
	
<body>
<!-- banner -->
<style>
.group-action-buttons a{
     margin-bottom: 10px;
 }
.sy_agile_team_grid_right h3{
    padding-right: 0
}
@media(max-width:800px){
    .model-mode-button{
        margin-bottom:10px;
    }
    .more-information-wrapper{
        margin-top: 2em;
    }
}    
</style>
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
                      <h1><span>A</span>pply Now<span class="slogan">"Learn from your Home"</span></h1>
                  </div>   
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
<?php 
//echo "select * from courses where courseCode='$type'";
$query=mysqli_query($con,"select * from courses where courseCode='$type'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{ 
	$type==$row['courseCode'];
	$date=date('d M Y',strtotime($row['courseStartDate']));
	$title=$row['courseName'];
	$tools=$row['courseTools'];
	$description=$row['courseShortDescription'];
	$price="NGN ".number_format($row['coursePrice']);
	$req="developer";
?>
	<div class="courses">
		<div class="container">
			<div class="sy_agile_team_grid">
				<div class="sy_agile_team_grid_left">
					<p>01</p>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
				</div>
				<div class="sy_agile_team_grid_right">
					<h3><?php echo($title)?></h3>
					<p><?php echo($description)?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileits_syrol_team_grids agileits_mail_grids">
                <div class="col-md-6 agileinfo_mail_grid_right">
				   <div class="row board-note">
                    <section class="details_onboard">
                          <p>
                            Apply now, <strong style="color:red">40%</strong> is OFF today
                        </p>
						<ul style="margin-top:20px">
                            <li>Location: <strong>Online</strong></li>
                            <li>Duration: <strong>8 Weeks</strong></li>
                            <li>Start Date: <strong><?php echo($date);?></strong></li>
                            <li>Language:  <strong><?php echo($tools);?></strong></li>
                        </ul>
                         <div style="margin-top: 1em;">
                             <strong style="font-size:25px;"><?php echo($price);?></strong>
                        </div>
					 </section>
                    </div>
				</div>

				<div class="col-md-6 agileinfo_mail_grid_left">
             <!-- mail -->

			<div class="message apply-wrapper">
        <div class="main-title sec">
            <div class="full-page-title header-title">
              <h1>Apply Now<span class="slogan">"Send your Application Form"</span></h1>
            </div>   
        </div>
      	<form method="post" class="row-fluid">
        	<div class="span6">
	          <label class="control-label">Full Name<span class="star"> *</span></label>
						<input class="input-block-level" name="name" id="name" type="text">
            </div>
        	<div class="span6">
	          <label class="control-label">Email Address<span class="star"> *</span></label>
						<input class="input-block-level"  name="email" id="email" type="email">
            </div>
            <div class="span6" style="margin-left:0">
	          <label class="control-label">Mobile Number<span class="star"> *</span></label>
						<input class="input-block-level" name="mobile" id="mobile" type="tel">
            </div>
        	<div class="span6">
	           <label class="control-label">Training Stack<span class="star"> *</span></label>
				<input class="input-block-level"  name="stack" id="stack" type="text" value="<?php echo($title);?>" required="" readonly>
            </div>

        	<div class="span12">
	          <label class="control-label">Message<span class="star"> *</span></label>
			<textarea class="input-block-level" rows="10"  name="note" id="note"></textarea>
          </div>
            <div class="span12" style="margin-left:1em">
            <button type="button" class="submit-btn" id="apply-career-trigger" cid="<?php echo($type)?>" req="<?php echo($req)?>"  mode="NONE" >Apply Now</button>
            </div>
        </form>
      </div>
         </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<?php } ?>
	<a href="#" data-toggle="modal" data-target="#myModal" code="ppfb01" id="openModel"></a>
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="padding-bottom:2em">
				<section>
					<div class="modal-body">
					    <h2 style="margi-bottom:0; padding-bottom:2px">Make Payment</h2>
					    <p style="margi-bottom:0; padding-bottom:2px"><strong style="font-size:25px;"><?php echo($price);?></strong></p>
					    <strong>Note:</strong> Any inquiry or issue for making the payment, chat with us now.  We have a team to attend your needs 24/7.
					    
					    <div class="btn-wrapper" style="margin-top:1em">
                           <a href="https://wa.me/2349065000062">
					        <button type="button" class="model-mode-button btn btn-success" style="margin-bottom:10px;" cid="<?php echo($type)?>" req="<?php echo($req)?>"  mode="TRANSFER" value="">Chat with Us <img src="images/whatsapp.png" style="width:20px"></button>
					      </a>
				
					      <button type="button" id="apply-career-trigger" class="model-mode-button btn btn-warning" style="margin-bottom:10px;" cid="<?php echo($type)?>" mode="CARD" req="<?php echo($req)?>"  value="">Pay now with Card</button>
					  </div>
					   
					</div>
				</section>
			</div>
		</div>
	</div>
	
	
	
	<div class="agile_map">
		<?php require('layouts/quote.php')?>
	</div>
    
<!-- //bootstrap-pop-up -->
<?php require('layouts/rating.php')?>
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