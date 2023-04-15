<?php
    session_start();
    require("../../config.php");
    if(isset($_SESSION['code'])){
        if(isset($_REQUEST['conf'])){
            if($_SESSION['code'] === $_REQUEST['conf']){
                $stmt = $connessione->prepare("UPDATE login SET status = 1 WHERE email=?");
                echo $_SESSION['email'];
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                header("Location: ../login.php");
            }else{
                header("Location: verification.php?e=1");
            }
        }
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
    <div>
        <h1> Verifica l'email </h1>
        <p> Controlla la posta elettronica e incolla il codice ricevuto nel box qui sotto </p>
        <?php 
            if(isset($_REQUEST['e'])){
                if($_REQUEST['e'] == 1){
                ?>
                    <span> Codice inserito non corretto </span>
                <?php
                }
            }
            
        ?>
        <form action="" method="POST">
            <input type="text" name="conf" id="conf">
            <input type="submit" value="conferma">
        </form>
    </div>
</body>
</html>