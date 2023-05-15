<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "resetpass/db.php";
//Load Composer's autoloader
require 'vendor/autoload.php';
$emailId = $_POST['email'];
 
    $result = mysqli_query($conn,"SELECT * FROM signup WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
    
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($conn,"UPDATE signup set  psw='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 $name=mysqli_query($conn,"SELECT prenom FROM signup WHERE email='" . $emailId . "'");

    $link = "<a href='http://localhost/efc/resetpass/respass.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'epifclubsousse@gmail.com';                     //SMTP username
    $mail->Password   = 'cvrjzrnjcgvntkpi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('epifclubsousse@gmail.com', 'EPI Fitness Club');    //Add a recipient
    $mail->addAddress($emailId);               //Name is optional
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Changement mot de pass';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    

    $mail->Body    = 'Cliquer ici pour changer votre mot de passe '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
      header('Refresh: 2; login.php');
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }
