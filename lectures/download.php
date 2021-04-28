<?php
	session_start();
	include('../include/config.php');
	error_reporting(0);
	if(isset($_GET['cid'])){
    
		$type=strtolower($_GET['cid']);
		$query=mysqli_query($con,"select * from courses where lower(courseCode)='$type'");
		$row1=mysqli_fetch_array($query); 
	}
	
  function Find($name){
   return  addslashes(trim($_POST[$name]));
  }

  if(isset($_POST['download'])){
      
       $RegId =strtolower('Unknown');

       if(isset($_POST['rid'])){
           
           $RegId = strtolower($_POST['rid']);
           
          if(isset($_POST['lecture'])){
              $lecture=strtoupper(Find('lecture'));
			  $Vid = $_POST['lecture'];
			  
			  
			  $query2=mysqli_query($con,"select * from videos where id='$Vid'");
			  $row2=mysqli_fetch_array($query2);
              $filepath="../admin/lecturesvideos/".$row2['vid_name'];
          }
    
       }
  
      
    
          
          $query3=mysqli_query($con,"select * from users where lower(reg_id)='$RegId'");
    	  $row3=mysqli_fetch_array($query3); 
    	  
    	  if(strtolower($type)==strtolower($row3['courseId']) || (strtolower($type)=='ppt02' or strtolower($type)=='mlt01' or strtolower($type)=='dst01')){
        
              if(strtolower($row3['reg_id']) == $RegId){
                  if(file_exists($filepath)) {
        				header('Content-Description: File Transfer');
        				header('Content-Type: application/octet-stream');
        				header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        				header('Expires: 0');
        				header('Cache-Control: must-revalidate');
        				header('Pragma: public');
        				header('Content-Length: ' . filesize($filepath));
        				flush(); // Flush system output buffer
        				readfile($filepath);
        				die();
        			} else {
        				http_response_code(404);
        				die();
        			}
             }
             else{
              echo('<script>alert("Oops! Unable to download the lecture")</script>');
             }
      }
       else{
          echo('<script>alert("Oops! Unable to download the lecture")</script>');
         }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Download Video Version of All the Lectures, <?php echo $row1['courseName'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We suggest you try to be attending all  the lectures in real-time instead of watching the recorded lecture."/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/responsive.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- js -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link rel="icon" type="image/png" href="../images/logo.PNG">
<!-- font-awesome-icons -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
 <link href="../css/simple-line-icons.css" rel="stylesheet" />
 <link href="../plugins/jalert/jAlert.css" rel="stylesheet" />
    
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<style>
.video-list-thumbs{
    
}
.video-list-thumbs > li{
    margin-bottom:12px;
   
}
.video-list-thumbs > li:last-child{}
.video-list-thumbs > li > a{
	display:block;
	position:relative;
	background-color: #111;
	color: #fff;
	padding: 8px;
	border-radius:3px
    transition:all 500ms ease-in-out;
    border-radius:4px
}
.video-list-thumbs > li > a:hover{
	box-shadow:0 2px 5px rgba(0,0,0,.3);
	text-decoration:none
}
.video-list-thumbs h2{
	bottom: 0;
	font-size: 14px;
	height: 33px;
	margin: 8px 0 0;
	text-transform:capitalize;
}
.video-list-thumbs .glyphicon-download{
    font-size: 60px;
    opacity: 0.6;
    position: absolute;
    right: 39%;
    top: 31%;
    text-shadow: 0 1px 3px rgba(0,0,0,.5);
    transition:all 500ms ease-in-out;
}
.video-list-thumbs > li > a:hover .glyphicon-download{
	color:#fff;
	opacity:1;
	text-shadow:0 1px 3px rgba(0,0,0,.8);
}
.video-list-thumbs .duration{
	background-color: rgba(0, 0, 0, 0.4);
	border-radius: 2px;
	color: #fff;
	font-size: 11px;
	font-weight: bold;
	left: 12px;
	line-height: 13px;
	padding: 2px 3px 1px;
	position: absolute;
	top: 12px;
    transition:all 500ms ease;
}
.video-list-thumbs > li > a:hover .duration{
	background-color:#000;

}
.not_available{
    opacity:0.3;
}
.course-image{
    height: 150px;
    width: 100%;
}

@media(max-width:600px){
        .course-image{
            height: 50px;
            width: 100%;
        }
}
@media (min-width:320px) and (max-width: 480px) { 
	.video-list-thumbs .glyphicon-download{
    font-size: 35px;
    right: 36%;
    top: 27%;
	}
	.video-list-thumbs h2{
		bottom: 0;
		font-size: 8px;
		height: 22px;
		margin: 8px 0 0;
	}
    
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
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
	<nav class="link-effect-2" id="link-effect-2">
		<ul class="nav navbar-nav">
			<li ><a href="https://syrol.org"><span data-hover="Home">Home</span></a></li>
            <li ><a href="../about"><span data-hover="About">About</span></a></li>
			<li ><a href="../services"><span data-hover="Services">Services</span></a></li>
            <li ><a href="../programs"><span data-hover="Programs">Programs</span></a></li>
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span data-hover="Join Syrol">Join Syrol</span> <b class="caret"></b></a>
				    <ul class="dropdown-menu agile_short_dropdown">
				        <li><a href="../engineer">Become a Software Engineer</a></li>
                        <li><a href="../programs">Learning Community Online</a></li>
				    </ul>
            </li>
			<li><a href="../contact"><span data-hover="Mail Us">Mail Us</span></a></li>
		</ul>
	</nav>
</div>
<div class="sy_agile_phone">
	<p><i class="fa fa-phone" aria-hidden="true"></i> (+234)9065000062</p>
</div>
<div class="chatus-on-whatsapp">
    <a href="https://wa.me/2349065000062">
	   <p style="margin-right: 7px;"><i class="fa fa-comment" aria-hidden="true"></i> Chat with Us</p>
	</a>
</div>
<div class="header-bar-wrapper">
      <div class="full-page-title">
    <h1>
                     
    <ul class="header-bar-list">
        <li><a href="../assignment" title="Submit Assignment"><i class="icon icon-cloud-upload <?php echo($assignment)?>"></i></a></li>
        <li><a href="../certificates"  title="View Certificate"><i class="icon icon-badge <?php echo($certificate)?>"></i></a></li>
        <li><a href="../students"  title="Our Students"><li><i class="icon icon-people <?php echo($students)?>"></i></a></li>
     </ul>
          </h1>
        </div> 
</div>
            

        </nav>
		<div class="wthree_banner1_info">
			<div class="container">
                   <div class="full-page-title">
              <h1><span>V</span>ideo Lectures<span class="slogan">"Download Lecture"</span></h1>
             </div>  
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
	<div class="courses">
		<div class="container">
          
            
            <?php
              if(mysqli_num_rows($query)>0){
            ?>
            <div class="sy_agile_team_grid">
				<div class="sy_agile_team_grid_left">
					<p>01</p>
					<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
				</div>
				<div class="sy_agile_team_grid_right">
					<h3><?php echo $row1['courseName'];?></h3>
					<p><?php echo $row1['courseShortDescription'];?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
        
        <?php }?>

<ul class="list-unstyled video-list-thumbs row" style="margin-top:2em">
	<?php
		$query=mysqli_query($con,"select * from videos where course_code='$type'");
		$cnt=1;
    
      if(mysqli_num_rows($query)>0){
		while($row=mysqli_fetch_array($query))
		{ 
			$ccode = $row['course_code'];
			$query5=mysqli_query($con,"select * from courses where courseCode='$ccode'");
			$row5=mysqli_fetch_array($query5); 
	?>
	<li class="col-md-4 col-xs-6" lecture="day1">
		<a href="#" title="Download" data-toggle="modal" data-target="#myModal"  id="openModel" lecture="<?php echo $row['id'];?>" courseid="<?php echo $row['courseCode'];?>" class="videoDownloadTrigger">
			<img src="../admin/courseimages/<?php echo $row5[id];?>/<?php echo $row1['courseImage'];?>" alt="Python" class="img-responsive course-image" height="170px"  />
			<h2><?php echo $row['vid_title'];?></h2>
			<span class="glyphicon glyphicon-download"></span>
			<!--<span class="duration">1:32</span>-->
		</a>
	</li>
	<?php } 
      }else{
             echo('
                        <div class="info-section">
                          <img src="../images/failedIcon.png" class="check">
                          <h2>No Lectures Available</h2>
                        </div>
                      ');
      }
    ?>
</ul>
<!-- //error -->
        </div>
	</div>
<!-- //mail -->

	<a href="#" data-toggle="modal" data-target="#myModal"  id="openModel"></a>
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="padding-bottom:2em">
				<section>
					<div class="modal-body">
					    <h2 style="margi-bottom:0; padding-bottom:2px">Download Lecture</h2>
					    <!--<p style="margi-bottom:0; padding-bottom:2px"><strong style="font-size:25px;"><?php //echo number_format($row1['coursePrice']);?></strong></p>-->
						<p style="margi-bottom:0; padding-bottom:2px"><strong style="font-size:25px;">&nbsp;</strong></p>
					   	<form action="#" method="post">
    					   	<div class="col-md-8 agileinfo_mail_grid_left">
    					   	    <input class=" form-control" name="lecture" value="" id="currentLecture-input" style="display:none"/>
            					<input class=" form-control" name="rid" type="text" id="rid" placeholder="Reg Number  eg. MST001" required=""maxlength="15" />
    				    	</div>
    				    	<div class="col-md-4 agileinfo_mail_grid_left">
            					<button type="submit" name="download" class="btn btn-warning" >Download</button>
    				    	</div>
				        </form>
		</div>
        </section>
	</div>
    </div>
    </div>
<!-- footer -->
<?php require('../layouts/footer.php')?>
<!-- //footer -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript" src="../plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="../plugins/jalert/jAlert-functions.js"></script>
<script type="text/javascript" src="../js/ayral.js"></script>
<script type="text/javascript" src="../js/sign.service.js"></script>
    

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		
		$('.videoDownloadTrigger').on('click',function(){
		    var lecture=$(this).attr('lecture');
		    $('#currentLecture-input').attr('value',lecture);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
	<script src="../js/bootstrap.js"></script>
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