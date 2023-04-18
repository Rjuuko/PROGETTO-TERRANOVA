<?php

    require("../../config.php");
    if(!($_REQUEST['passwd'] === $_REQUEST['passwdconf'])){

         header("location: ../register.php?e=2");
         exit;
     }

    $email = $connessione->real_escape_string($_REQUEST['email']);
    $password = $connessione->real_escape_string($_REQUEST['passwd']);
    
    $stmt = $connessione->prepare("SELECT * FROM `login` WHERE email = ?"); // guardo se esiste il nome utente inserito
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) >= 1 ){
        header("location: ../register.php?e=1"); // ritorno sul form perchè il nome utente è gia in uso
        exit;
    }

    $stmt = $connessione->prepare("INSERT INTO login(email, password, status) VALUES (?, ?, ?)");
    $passwd =  password_hash($password, PASSWORD_DEFAULT); // creo la password criptata

    $status = 0;
    $stmt->bind_param("ssi", $email, $passwd, $status);

    $stmt->execute();
    $_SESSION['email'] = $_REQUEST['email'];
    header("Location: email.php");
?>
