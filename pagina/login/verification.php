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
                if(isset($_GET['d'])){
                    header("Location: ../addData/deleteContract.php");
                }
                header("Location: ../index.php");
                
                
            }else{
                header("Location: verification.php?e=1");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Verification</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .diverso{
            border:1.5px solid rgba(0,0,0,0.25);
            margin-top:10vw;
            position:flex;
            display: flex;
            justify-content: center;
            background-color:rgba(0,0,0,10%);
        }
    </style>
</head>
<body>
<div class="b-example-divider"></div>
<div class=diverso>
<div class="px-4 pt-5 my-5 text-center border-bottom"></div>
    <center>
        <div class="col">
            <strong>
            <h1 class="my-5 display-3 fw-bold ls-tight">Verifica l'email</h1>
            </strong>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <div class=form-group>

            <p style=font-size:large style=margin-top:2vw> Controlla la posta elettronica e incolla il codice ricevuto nel box qui sotto <?php if(isset($_GET['d'])){ echo " per eliminare definitivamente il tuo contratto";} ?></p>
            <?php 
                if(isset($_REQUEST['e'])){
                    if($_REQUEST['e'] == 1){
                    ?>
                        <div class=alert>
                        <span class="closebtn"><strong> Codice inserito non corretto </strong></span>
                    <?php
                    }
                }
                
            ?>
            <form action="" method="POST">
                <input class=form-control style=width:30vw;margin-top:2vw;height:2.5vw type="text" name="conf" id="conf">
                <input class="btn btn-primary btn-block mb-4" style=margin-top:2vw;height:2.5vw;width:6vw;align-text:center type="submit" value="conferma">
            </form>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
        </div>
    </div>
    <div class="b-example-divider"></div>
    </center>
</div>
            
            
</body>
</html>
