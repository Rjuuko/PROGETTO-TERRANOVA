<?php

    require("../../config.php");
    $email = $connessione->real_escape_string($_REQUEST['email']);
    $password = $connessione->real_escape_string($_REQUEST['passwd']);
    if(!is_null($email)){
        $stmt = $connessione->prepare("SELECT * FROM `login` WHERE email =?");

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result= $stmt->get_result();
        $row = $result->fetch_assoc();
        session_start();
        if(mysqli_num_rows($result) != 0){ // guardo se risulta un username associato
            if(password_verify($password, $row['password'])){ // controllo la password inserita
                
                $_SESSION['userID'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['passwd'] = $password;
                header("Location: ../index.html");

            }else{
                header("Location: ../login.php?e=2");
                // errore password sbagliata
                exit;
            }  
        }else{
            header("Location: ../login.php?e=1");
            // errore email non trovata
            exit;
        } 
    }




?>