<?php
session_start();
include('include/config.php');
$title="Unknown  Course  Preview";
$description="Unknown Course Infromation";
$price="Not Available";
$date="Not Available";
$tools="Unknown";
$type="none";
$req="user";

if(isset($_GET['cid'])){
    
    $type=strtolower($_GET['cid']);
    $query=mysqli_query($con,"select * from courses where courseCode='$type'");
    $cnt=1;
    
    if(mysqli_num_rows($query)>0){
        
        if($row=mysqli_fetch_array($query)){ 
            $type==$row['courseCode'];
            $date=date('d M Y',strtotime($row['courseStartDate']));
            $title=$row['courseName'];
            $tools=$row['courseTools'];
            $description=$row['courseShortDescription'];
            $price="NGN ".number_format($row['coursePrice']);
            $req="developer";
        }
    }
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
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="images/logo.png">
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/simple-line-icons.css" rel="stylesheet" />
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />

<!-- //font-awesome-icons -->
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
                      <h1><span>C</span>ourse Syllabus<span class="slogan">"Program Outline"</span></h1>
                </div>  
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
	<div class="courses">
		<div class="container">
			<div class="sy_agile_team_grid">
				<div class="sy_agile_team_grid_left">
					<p>01</p>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
				</div>
				<div class="sy_agile_team_grid_right header_course_left">
					<h3><?php echo($title)?></h3>
					<p><?php echo($description)?></p>
                    
                    <div class="row rightbar">
                        <div class="col-md-6">
                            <h3>Summary</h3>
                        <?php echo stripslashes($row['courseSummary']);?>
                        </div>
                        <div class="col-md-6">
                            <strong style="font-size:25px;"><?php echo($price);?></strong>
                            
                            <div class="btn-group group-action-buttons" style="margin-top:1em">
                                 <a  href="syllabus/<?php echo($type)?>.pdf" download="<?php echo($title)?>.pdf">
                                <button type="button" class="btn btn-danger">Get Syllabus</button>
                                </a>
                                
                                <a href="apply?cid=<?php echo($type);?>">
                                <button type="button" class="btn btn-warning">Apply Now</button>
                                </a>
                              
                            </div>
                        </div>
                    </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileits_syrol_team_grids agileits_mail_grids sy_agile_team_grid_right course_description_left">
				<?php echo $row['courseDetail'];;?>
                <a  href="syllabus/<?php echo(substr($type, 0, -2))?>.pdf" download="<?php echo($title)?>.pdf" > Get the Syllabus  now </a> or contact us. </p>
                <a href="apply?cid=<?php echo($type);?>">
                <button class="btn btn-warning" style="margin-top:2em">Apply Now</button>   
                </a>
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
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>