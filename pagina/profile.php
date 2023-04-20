<?php
    require("../config.php");
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }

    $sql = "SELECT * FROM persone WHERE email = ?";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Profilo Personale </h1>
    <h3> 
</body>
</html>