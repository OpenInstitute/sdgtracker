<?php include ('inc/conn.inc'); ?>
<?php $title = "SDG Tracker | Correnspondence"; ?>
<?php include ('inc/header.php'); ?>
<?php include ('inc/menu.php'); ?>
<?php include ('inc/top-bar.php'); ?>
<?php
$name=$_POST["name"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$country=$_POST["country"];
$zip=$_POST["zip"];
$email=$_POST["email"];
$comments=$_POST["comments"];
$redirect=$_POST["redirect"];
$subject=$_POST["subject"];
$recipient=$_POST["recipient"];
$formname=$_POST["formname"];


if ($formname=="newsletter"){
	      $strMsg .= " Person  with email :: " . $email ;
	      $strMsg .= " activated the newsletter form on the internet.";
	      mail_it($strMsg, "http://sdgtracker online feedback form","hello@openinstitute.com", $email);
	      header("location:index.php");
}

if ($formname=="ContactUs"){

	      $strMsg .= " Person named:: " . $name ." with email :: " . $email ;
	      $strMsg .= " activated the contact form on sdgtracker.info.";
	      $strMsg .= " Comment :: " . $comments ;
	      mail_it($strMsg, "http://sdgtracker.info online feedback form","hello@openinstitute.com", $email);
	      
	      $k = '<div class="row">
					<div class="col-md-12 panel panel-heading">
						<h3>Thank You '. $name .'</h3>
						 <p>We appreciate you taking time to visit SDG Tracker.</p>
						 
						 <p>We will review and respond to you regarding your comment/concern.</p>
						 
						<p>Please continue visiting other pages for more information.</p>
					</div>
				</div>';
}

	      // mail the content we figure out in the following steps
function mail_it($content, $subject, $recipient ,$youremail) {

   //$headers .= "To: $recipient\n"; //"From: ".$email."\n"; 
   $headers = "From: ".$youremail."\n"; 
   $headers .= "Reply-to:  ".$youremail."\n";
   $headers .= "Bcc: kevin@openinstitute.com \n";
   $headers .= "MIME-Version: 1.0 \r\n";
   $headers .= "Content-type:text/html;charset=iso-8859-1 \r\n";
   
	$message  = $content;
//echo $message;
   $k = mail($recipient, $subject, $message, $headers);
   echo $k;
}

echo $k;
?>


<?php include('inc/footer.php'); ?>
