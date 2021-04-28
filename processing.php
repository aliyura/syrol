<?php
require 'server/mailer.php';
session_start();
include('include/config.php');
$ref="uknown";
$pid="uknown";
$res="uknown";
$cid="uknown";
$name="uknown";
$email="uknown";
$mobile="uknown";
$stack="uknown";
$note="uknown";

function sendEmail($from,$name,$subject,$body){
     
    $sender=new Mailer();
    $to='management@syrol.org';
    
    return $sender->send(
        $from,  #sender
        $name,   #sender name
        $to,     #receiver
        $subject, #topic
        null,                   /// 'attachments/composer.json'
        $body
    );
}
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

 if(isset($_GET['res']) and isset($_GET['ref']) and isset($_GET['pid']) and isset($_GET['cid'])){
      $ref=$_GET['ref'];
      $pid=$_GET['pid'];
      $res=$_GET['res'];
      $req=$_GET['req'];
      $cid=$_GET['cid'];
     
       if(!isset($_SESSION[$ref])) {   

         if(isset($_GET['name'])) $name=$_GET['name'];
         if(isset($_GET['email'])) $email=$_GET['email'];
         if(isset($_GET['mobile'])) $mobile=$_GET['mobile'];
         if(isset($_GET['stack'])) $stack=$_GET['stack'];
         if(isset($_GET['note'])) $note=$_GET['note'];


         //compose an  email
          $header="New Career Application";
          $body="
           Hi Syrol, I am ".$name.", with email ".$email." and mobile ".$mobile.".
           I am joinning your program for ".$stack.". My payment transaction number is ".$ref.".
           <p><br/></p>
           ".$note."<br/><br/>".$req."
         ";
           
           $_SESSION[$ref]=1;
           function getRandomString($length = 6) {
				$characters = '0123456789';
				$string = '';

				for ($i = 0; $i < $length; $i++) {
					$string .= $characters[mt_rand(0, strlen($characters) - 1)];
				}

				return $string;
			}
			$reg_id=strtoupper(trim($cid).trim(getRandomString()));
		    $sql=mysqli_query($con,"insert into users(name,email,contactno,courseId,courseName,notes,transacNo,rec,reg_id,status) values('$name','$email','$mobile','$cid','$stack','$note','$ref','$req','$reg_id','PV')");
		   
           sendEmail($email,$name,$header,$body);
           redirect("https://syrol.org/info.php?type=career&res=s200");
   
       }else {
            redirect('https://syrol.org/info.php?type=career&res=f001');
       }
 }else{
     redirect('https://syrol.org/info.php?type=career&res=f001');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Processing your Application</title>
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
<link href="plugins/jalert/jAlert.css" rel="stylesheet" />
    
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<style>
 .info-section{
	  text-align:center;
	  padding:2em;
	  min-height:300px;
	  margin-top:20%;
 }
 .check{
	 width:60px;
 }
    
@media (max-width: 800px){
    .info-section{
	  margin-top:50%;
    } 
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
<!-- //banner -->	
    
<div class="info-section">
     <img src="images/progress.gif" class="check">
     <br/> <br/>
     <p>Please Wait...</p>
</div>  
<script type="text/javascript" src="plugins/jalert/jAlert.js"></script>
<script type="text/javascript" src="plugins/jalert/jAlert-functions.js"></script>
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

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