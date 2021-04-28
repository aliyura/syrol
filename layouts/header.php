
<?php

 $home="";
 $about="";
 $contact="";
 $apply="";
 $services="";
 $certificate="";
 $students="";
 $assignment="";

 $page=basename($_SERVER['PHP_SELF']);

if($page=="index.php"){
    $home="active";
}
else if($page=="about.php"){
    $about="active";
}
else if($page=="contact.php"){
    $contact="active";
}
else if($page=="apply.php" or $page=="programs.php"){
    $apply="active";
}
else if($page=="students.php"){
    $students="active";
}
else if($page=="assignment.php"){
    $assignment="active";
}
else if($page=="certificates.php"){
    $certificate="active";
}
else if($page=="services.php"){
    $services="active";
}
else if($page=="contact.php"){
    $contact="active";
}
?>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
	<nav class="link-effect-2" id="link-effect-2">
		<ul class="nav navbar-nav">
			<li class="<?php echo($home)?>"><a href="https://syrol.org"><span data-hover="Home">Home</span></a></li>
            <li class="<?php echo($about)?>"><a href="about"><span data-hover="About">About</span></a></li>
			<li class="<?php echo($services)?>"><a href="services"><span data-hover="Services">Services</span></a></li>
            <li class="<?php echo($apply)?>"><a href="programs"><span data-hover="Programs">Programs</span></a></li>
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span data-hover="Join Syrol">Join Syrol</span> <b class="caret"></b></a>
				    <ul class="dropdown-menu agile_short_dropdown">
				       <li><a href="engineer">1-on-1 Study</a></li>
                        <li><a href="programs">Study with Team</a></li>
                        <li><a href="instructor">Become our Instructor</a></li>
                       
				    </ul>
            </li>
			<li class="<?php echo($contact);?>"><a href="contact"><span data-hover="Mail Us">Mail Us</span></a></li>
		</ul>
	</nav>
</div>
<div class="sy_agile_phone">
	<p><i class="fa fa-phone" aria-hidden="true"></i> (+234)7062029832</p>
</div>
<div class="chatus-on-whatsapp">
    <a href="https://wa.me/2347062029832">
	   <p style="margin-right: 7px;"><i class="fa fa-comment" aria-hidden="true"></i> Chat with Us</p>
	</a>
</div>
<div class="header-bar-wrapper">
      <div class="full-page-title">
    <h1>
                     
    <ul class="header-bar-list">
        <li><a href="assignment" title="Submit Assignment"><i class="icon icon-cloud-upload <?php echo($assignment)?>"></i></a></li>
        <li><a href="certificates"  title="View Certificate"><i class="icon icon-badge <?php echo($certificate)?>"></i></a></li>
        <li><a href="students"  title="Our Students"><li><i class="icon icon-people <?php echo($students)?>"></i></a></li>
     </ul>
          </h1>
        </div> 
</div>
			    