<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');

session_start();
include('../include/config.php');
include 'mailer.php';


$request="CONTACT";
if(isset($_GET['request'])){
    $request=strtoupper($_GET['request']);
}

function Find($name){
   return  addslashes(trim($_POST[$name]));
}

function GET($name){
   return  addslashes(trim($_GET[$name]));
}
function generateTransId(){
     return mt_rand(100000, 999999);
}

$curl = curl_init();


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
function replyEmail($to,$name,$subject,$body,$attachment){
     
    $sender=new Mailer();
    $from='management@syrol.org';
    
    return $sender->send(
        $from,  #sender
        $name,   #sender name
        $to,     #receiver
        $subject, #topic
        $attachment,                   /// 'attachments/composer.json'
        $body
    );
}



if($request=="CONTACT"){

    $name= Find('name');
    $email=  Find('email');
    $mobile=  Find('mobile');
    $message= nl2br(Find('message'));


    if($name!='' and  strlen($name)>=3 and $mobile!='' and  strlen($mobile)>=10 and $email!=''  and strpos($email, '@')  and strpos($email, '.')){
        
         $header="New Message";
         $body="
          Hi Syrol, i am ".$name.", with email ".$email." and mobile ".$mobile.".
         <p><br/></p>
          ".$message."
        ";
    
         $response=sendEmail($email,$name,$header,$body);
         echo("Success");
    }
    else{
       echo('Failed, Params are required');
    }

}
else if($request=="MESSAGE"){

    $receiver= Find('receiver');
    $subject=  Find('subject');
    $cc=  Find('cc');
    $body= nl2br(Find('body'));
    $filesCount = count($_FILES['files']['name']);
    $attachments=array();
    $uploadedCount=0;
    $isAttached=false;


     // Looping all files
    if($filesCount>0){
        $isAttached=true;
         for($i=0;$i<$filesCount;$i++){
           $filename = $_FILES['files']['name'][$i];
           $path='attachments/'.$filename;
           if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
             $uploadedCount=$uploadedCount+1;
              array_push($attachments,$path);
           }
         }
    }
    
    if($filesCount>0){
        if($uploadedCount>=$filesCount){
            $response=replyEmail($receiver,'Syrol Technologies',$subject,$body,$attachments);
              echo("Success");
        }
        else{
            echo('AUC');
        }
    }else{
        $response=replyEmail($receiver,'Syrol Technologies',$subject,$body,null);
          echo("Success");
    }

}
else if($request=="ASSIGNMENT"){

    $regid= strtoupper(Find('regid'));
    $title= Find('title');
    $content=  Find('content');
    $message=  Find('message');
    
    $query=mysqli_query($con,"select * from users where upper(reg_id)='$regid'");
    if(mysqli_num_rows($query)>0){
        
        
         mysqli_query($con,"INSERT INTO assignments(student_id, title, content, note) VALUES ('$regid','$title','$content','$message')");
         $header=ucwords("Assignment for ".$title);
         $body="
          Dear Syrol, I am ".strtoupper($regid).", please checkout my assignment for ".$title.".
         <p><br/></p>
          ".$message."
        ";
    
         $response=sendEmail($email,$name,$header,$body);
         echo("Success");
        
    }else{
        echo("Invalid Registration Number");
    }
   
}
else if($request=="CAREER"){

    $name= Find('name');
    $email=  Find('email');
    $mobile=  Find('mobile');
    $stack=  Find('stack');
    $note=  nl2br(Find('note'));
    $cid= strtolower(trim(GET('cid')));
    $mode= strtoupper(GET('mode'));
    $req= strtoupper(GET('req'));
    $price="0";
    
    
    $query=mysqli_query($con,"select * from courses where lower(courseCode)='$cid'");
    if(mysqli_num_rows($query)>0){
        if($row=mysqli_fetch_array($query)){
            $price=$row['coursePrice'];
        }
    }

   if($name!='' and  strlen($name)>=3 and $mobile!='' and  strlen($mobile)>=11 and $email!='' and strpos($email, '@')  and strpos($email, '.')){

            if($mode=="CARD"){

                $currentuserid ='sy-'.$cid.'.'.$email;
                $amount =$price;
                $customer_email = $email;
                $currency = "NGN";
                $txref = "rave-".generateTransId(); // ensure you generate unique references per transaction.
                $PBFPubKey = "FLWPUBK-5223dc4a8ecb5f308aa5d3e95bc00003-X"; // get your public key from the dashboard.
                $redirect_url = "https://syrol.org/processing.php?type=career&res=s200&pid=".$currentuserid."&cid=".$cid." &ref=".$txref.'&mobile='.$mobile.'&email='.$email.'&name='.$name.'&stack='.$stack.'&note='.$note.'&req='.$req;
                $error_redirect_url = "https://syrol.org/info.php?type=career&res=f001";
                $payment_plan = "pass the plan id"; // this is only required for recurring payments.


                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode([
                    'amount'=>$amount,
                    'customer_email'=>$customer_email,
                    'currency'=>$currency,
                    'txref'=>$txref,
                    'PBFPubKey'=>$PBFPubKey,
                    'redirect_url'=>$redirect_url,
                    'payment_plan'=>$payment_plan
                  ]),
                  CURLOPT_HTTPHEADER => [
                    "content-type: application/json",
                    "cache-control: no-cache"
                  ],
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                if($err){
                  // there was an error contacting the rave API
                   $error_redirect_url=$error_redirect_url.'&error='.$err;
                   echo('failed:'.$error_redirect_url);
                }

                $transaction = json_decode($response);
                if(!$transaction->data && !$transaction->data->link){
                  // there was an error from the API
                  $error_redirect_url=$error_redirect_url.'&error='.$transaction->message;
                  echo('failed:'.$error_redirect_url);
                }
            
                if($transaction->data && $transaction->data->link){
                    echo('success:'.$transaction->data->link);
                }
            }
            else{
                
                   
                 //compose an  email
                  $header="New Career Application";
                  $body="
                   Hi Syrol, I am ".$name.", with email ".$email." and mobile ".$mobile.".
                   I am joinning your program for ".$stack.". I will make the payment when i get there.
                   <p><br/></p>
                   ".$note."<br/><br/>".$req."
                 ";
              sendEmail($email,$name,$header,$body);
              echo(':success');
            }
   }
   else{
      echo('Failed, Params are required');
   }
}
else if($request=="HIRE"){

    $name= Find('name');
    $email=  Find('email');
    $mobile=  Find('mobile');
    $type=  Find('type');
    $stack=  Find('stack');
    $note=  nl2br(Find('note'));
    
    if($name!='' and  strlen($name)>=3 and $mobile!='' and  strlen($mobile)>=11 and $email!='' and strpos($email, '@')  and strpos($email, '.')){
        
        $header="New Hiring Application";
        $body="
         Hi Syrol, We are ".$name.", with email ".$email." and telephone ".$mobile.".
         We will like to hire ".$type." with stack of ".$stack.".
        
        <p><br/></p>
         ".$note."
       ";
    
        $response=sendEmail($email,$name,$header,$body);
        echo("Success");
    }
    else{
        echo('Failed, Params are required');
    }
}
else if($request=="OFFER"){

    $name= Find('name');
    $email=  Find('email');
    $mobile=  Find('mobile');
    $stack=  Find('stack');
    $note=  nl2br(Find('note'));


   if($name!='' and  strlen($name)>=3 and $mobile!='' and  strlen($mobile)>=11 and $email!='' and strpos($email, '@')  and strpos($email, '.')){
        
          
        $header="New Career Application";
        $body="
         Hi Syrol, I am ".$name.", with email ".$email." and mobile ".$mobile.".
         I am joinning your program for ".$stack.".
        <p><br/></p>
         ".$note."
       ";
    
        $response=sendEmail($email,$name,$header,$body);
        echo("Success");
        
   }
   else{
      echo('Failed, Params are required');
   }
}
else if($request=="LOGIN"){

    $username= GET('un');
    $password=  md5(GET('pw'));
    $storedPassword=md5('Syrol@1994');
    $storedUsers = array("management@syrol.org", "ceo@syrol.org", "staff@syrol.org");
    
    
    if($password==$storedPassword && in_array($username, $storedUsers) ){
         echo("Success");
    }
    else{
     echo('Failed'); 
    }
}
else{
    echo('Unknown');
}

?>