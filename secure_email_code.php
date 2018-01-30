<?php
//not cache this page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if(isset($_POST["send"])){
// Checking For Blank Fields..
if($_POST["headline"]==""||$_POST["email"]==""||$_POST["story"]==""){
$var2='Fill All Fields..';
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['email'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
$var2= "Invalid Sender's Email";
}
else{
$subject = "Lean In story";
$story = "Email ID : ".$email."\nHeadline : ".$_POST['headline']."\n".$_POST['story'];

$headers = 'From:'. $email . "\r\n"; // Sender's Email
//$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender

// Message lines should not exceed 70 characters (PHP rule), so wrap it
//$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("infoatleanindia@gmail.com", $subject, $story, $headers);
$var2='yes';
echo "Your story has been submitted successfully ! Our editors will get back to you, if your story gets selected! Thank you. ";
}
}
}
//redirect to this location. URL needs to be fixed
header("Location: index.php");
die();
?>