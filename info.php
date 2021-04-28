<?php
 $title="Infromation";
 $response="uknown";

 if(isset($_GET['type'])){
	 $tile=strtoupper($_GET['type']);

	 if($tile=="CONTACT"){
		$title="Thank you for contacting us. We will get back to you within 24 hours";
	 }
     else if($tile=="MESSAGE"){
		$title="Your message has been sent successfully. Well Done!";
	 }
	 else if($tile=="ASSIGNMENT"){
		$title="Your Assignment has been submited successfully. Keep the Spirit!";
	 }
	 else{
		$title="Thanks for Applying, We will get in touch with you within 24 hours";
	 }
 }

if(isset($_GET['res'])){
    $response=strtolower($_GET['res']);
    
    if($response=="f001"){
        $title="We are Unable to take your payment";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo($title)?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<link href="css/simple-line-icons.css" rel="stylesheet" />
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
    
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<style>
 .check{
	 width:60px;
 }
</style>  
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
              <h1><span>I</span>nformation<span class="slogan">"Notification"</span></h1>
             </div>  
			</div>
		</div>
	</div>
<!-- //banner -->	
<!-- mail -->
	<div class="courses">
		<div class="container">
            <!-- error -->
            <?php
                if($response=='f001'){
                    echo('
                       <div class="info-section">
                          <img src="images/failedIcon.png" class="check">
                          <h2>Something went Wrong!</h2>
                            <p>'.$title.'</p>
                        </div>
                    ');
                }else{
                     echo('
                       <div class="info-section">
                          <img src="images/checkIcon.png" class="check">
                          <h2>Great Job!</h2>
                            <p>'.$title.'</p>
                        </div>
                    ');
                }
            
            ?>
<!-- //error -->
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
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>