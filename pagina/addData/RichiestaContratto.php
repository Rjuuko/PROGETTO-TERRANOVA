<?php
    require("../../config.php");
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }

    if(isset($_SESSION['IDA'])){
        $sql = "SELECT * FROM sede WHERE IDAnagrafica = '". $_SESSION['IDA']. "';";
        $result = $connessione->query($sql);

    }
    
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
    <?php 
        if(mysqli_num_rows($result) = 0 ){
            ?>
                <h1> Sembra che tu non abbia aggiunto una sede </h1>
                <h3> Aggiungila ora </h3>
                <a href="addSede.php" class="btn btn-primary my-3"> </a>
            <?php
        }
    ?>
</body>
</html>