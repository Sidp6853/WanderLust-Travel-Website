<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 //Load Composer's autoloader
 require '12/PHPMailer.php';
 require '12/SMTP.php';
 require '12/Exception.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_REQUEST['name'];
    $email = $_REQUEST["email"]; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }

}

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '21ce072@charusat.edu.in';                     //SMTP username
    $mail->Password   = '6356766935';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('21ce072@charusat.edu.in', 'Bookkaro.com');
    $mail->addAddress($email);    
  

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Registration!';
    $mail->Body    = '<b>Your Account Created Successfully..</b><br><br><br>Thanks & Regards, <br> <b>Krunal Kevadiya <br>And from bookkaro .com team, </b><br> Mobail Number: 7046631796 <br>';

    if($mail->send()){
                 echo '<script type="text/javascript">alert("massage sent!")</script>';
        
            }
            else{
                echo '<script type="text/javascript">alert("Try again!")</script>'; 
            }

    



   


?>
