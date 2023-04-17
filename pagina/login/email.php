<?php
    session_start();
    if(empty($email)){
        $email = $_SESSION['email'];
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
        
    require 'C:\xampp2\php\pear\PHPMailer-master\src\Exception.php';
    require 'C:\xampp2\php\pear\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp2\php\pear\PHPMailer-master\src\SMTP.php';


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $code = substr(md5(uniqid(rand(), true)), 16, 16);
    $_SESSION['code'] = $code;
    try {
        //Server settings                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bduxbbsj@gmail.com';                     //SMTP username
        $mail->Password   = 'kixdeqgdyqpkfmoy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('bduxbbsj@gmail.com', 'FiveHouse');
        $mail->addAddress($email);     //Add a recipient            //Name is optional
        //Attachments

        //Contentzniczicz@gmail.co
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Codice di verifica';
        $mail->Body    = 'Ecco il codice di verifica <b>' . $code. '</b>';
        $mail->AltBody = 'Ecco il codice di verifica' . $code;

        $mail->send();


        header("Location: verification.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>