<?php

    require("../../config.php");
    if(!($_REQUEST['passwd'] === $_REQUEST['passwdconf'])){

         header("location: ./registration_form.php?test=1");
         exit;
     }

    $email = $connessione->real_escape_string($_REQUEST['email']);
    $password = $connessione->real_escape_string($_REQUEST['passwd']);
    
    $stmt = $connessione->prepare("SELECT * FROM `login` WHERE email = ?"); // guardo se esiste il nome utente inserito
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) >= 1 ){
        $_SESSION['regerr'] = 2;
        header("location: ./register.php"); // ritorno sul form perchè il nome utente è gia in uso
        exit;
    }

    $stmt = $connessione->prepare("INSERT INTO login(email, password) VALUES (?, ?)");
    $passwd =  password_hash($password, PASSWORD_DEFAULT); // creo la password criptata

    echo $email;
    echo $passwd;
    $stmt->bind_param("ss", $email, $passwd);

    $stmt->execute();

    header("Location:login.php")

?>