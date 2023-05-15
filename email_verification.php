<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "resetpass/db.php";
//Load Composer's autoloader
require 'vendor/autoload.php';
$fName = $_GET['fName'];
$email = $_GET['email'];
var_dump($fName);
var_dump($email);

 
    $result = mysqli_query($conn,"SELECT * FROM signup WHERE prenom='" . $fName . "'");
 
    $row= mysqli_fetch_array($result);
    
  if($row)
  {
       

    $link = "<a href='http://localhost/efc/signin2.php?fName=".$fName."'>Vérifier votre email</a>";

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
    $mail->addAddress($email);               //Name is optional
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vérification Email';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    

    $mail->Body    = 'Cliquer ici pour '.$link.'';
    if($mail->Send())
    {

      header(' login.php');
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }
