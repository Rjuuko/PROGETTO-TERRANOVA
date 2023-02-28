<?php

    require("../../config.php");
    $email = $connessione->real_escape_string($_REQUEST['email']);
    $password = $connessione->real_escape_string($_REQUEST['passwd']);
    if(!is_null($email)){
        $stmt = $connessione->prepare("SELECT * FROM `utenti` WHERE email =?");

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
                echo "ciao";
                //header("Location: ")

            }else{
                echo "balls";
                // errore password sbagliata
                exit;
            }  
        }else{
            echo "pallette";
            // errore email non trovata
            exit;
        }
        
        
    }




?>