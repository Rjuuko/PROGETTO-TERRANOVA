<?php
    session_start();
  
    require("../../config.php");

    $sql = "SELECT RagSoc FROM persone WHERE email = '" . $_SESSION['email'] . "';";
    $result = $connessione->query($sql);
    $row = mysqli_fetch_assoc($result);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
        
    require 'C:\xampp2\php\pear\PHPMailer-master\src\Exception.php';
    require 'C:\xampp2\php\pear\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp2\php\pear\PHPMailer-master\src\SMTP.php';


    $txtCode = $_GET['text'];
    if($txtCode == 1){
        $Body = 'Ecco il codice di verifica <b>' . $code. '</b>';
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $code = substr(md5(uniqid(rand(), true)), 16, 16);
    $_SESSION['code'] = $code;
    $email = $_SESSION['email'];

    $txtCode = $_GET['text'];
    if($txtCode == 1){
        $Sub = 'Codice di verifica';
        $Body = 'Ecco il codice di verifica <b>' . $code. '</b>';
        $Alt = 'Ecco il codice di verifica' . $code;
    }else if($txtCode == 2){
        $Sub = 'Conferma Richiesta Contratto';
        $Body = "E appena stata fatta una richiesta di contratto, raggiungi l'agenzia più vicina per stipularlo ";
        $Alt = "E appena stata fatta una richiesta di contratto, raggiungi l'agenzia più vicina per stipularlo ";
    }else if($txtCode == 3){
        $Sub = 'Conferma Rimozione Contratto';
        $Body = "Incolla questo codice nella schermata uscita per eliminare <b>DEFINITIVAMENTE</b> il tuo contratto " . $code;
        $Alt = "Incolla questo codice nella schermata uscita per eliminare DEFINITIVAMENTE il tuo contratto " . $code;
    }else if($txtCode == 4){
        $Sub = 'Richiesta Nuovo Contratto';
        $Body = 'E arrivata una nuova richiesta di contratto da parte di ' . $row['RagSoc'];
        $Alt = 'E arrivata una nuova richiesta di contratto da parte di ' . $row['RagSoc'];
        $email = "bduxbbsj@gmail.com";
    }
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
        $mail->Subject = $Sub;
        $mail->Body    = $Body;
        $mail->AltBody = $Alt;

        $mail->send();

        if($txtCode == 1){
            header("Location: verification.php");
        }else if ($txtCode == 2){
            header("Location: email.php?text=4");
        }elseif($txtCode == 4){
            header("Location: ../index.php");
        }elseif($txtCode == 3){
            $_SESSION['isDel'] = 1;
            header("Location: verification.php?d=1");
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>