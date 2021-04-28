<?php
header("Access-Control-Allow-Origin: *");
require 'mailer.php';


function sendEmail($to,$name,$subject,$body){
     
    $sender=new Mailer();
    $from='study@syrol.org';
    
    return $sender->send(
        $from,  #sender
        $name,   #sender name
        $to,     #receiver
        $subject, #topic
        null,                   /// 'attachments/composer.json'
        $body
    );
}


function fire($email){
    sendEmail($email,'Study at Syrol Technologies','Shell Script Comprehensive Training Batch105','
    Dear Sir/Ma,<br/><br/>
    Greetings for the day.
    <br/><br/>
    You have been enrolled to our Shell Scripting training  and 16th Jan 2021 is the starting day. The training will hold online using Skype. Please download Skype and join via link below.
    <br/><br/>

    Batch: 105<br/>
    Duration:  4-6 Weeks<br/>
    Start Time: 9AM-10AM<br/>
    Start Date: Sunday 16th Jan 2021<br/>
    Skype Group:https://join.skype.com/kjtFIg3WybvF<br/>
    Download Skype: https://www.skype.com/en/get-skype/download-skype-for-desktop <br/>
    <br/><br/>
    
    Join now to prepare for the training<br/>
    https://join.skype.com/kjtFIg3WybvF
    <br/>
    <br/>
    <strong><span style="color:red">Note:</span>
    <br/>
    If you miss any class or the entire course, you will have to watch the video version of  it as it won\'t be repeated.
    </strong>
    <br/>

    We look forward to hearing you online!
    
    
    <br/>');
    echo('sent');
}


$receipaints= array('ojongemmanuel95@gmail.com');
foreach ($receipaints as $receiver) {
  fire($receiver);
  echo('<br/>Sent  '.$receiver);
}




?>