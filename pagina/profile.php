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
    $row = $result->fetch_assoc();

    

    $data = array( "Cognome", "Nome", "PIVA", "CFisc", "Indirizzo", "Civico", "CAP", "Localita","Provincia","Nazione", "NumeroTelefonico", "Email");
    if(!empty($_REQUEST["Cognome"]) || !empty($_REQUEST["Nome"]) || !empty($_REQUEST["PIVA"]) || !empty($_REQUEST["CFisc"]) || !empty($_REQUEST["Indirizzo"]) || !empty($_REQUEST["Civico"]) || !empty($_REQUEST["CAP"]) || !empty($_REQUEST["Localita"]) || !empty($_REQUEST["Provincia"]) || !empty($_REQUEST["Nazione"]) || !empty($_REQUEST["NumeroTelefonico"]) || !empty($_REQUEST["Email"] )){
        for($x = 0; $x < count($data); $x++){
            $string = $data[$x];
            
            if(empty($_REQUEST[$string])){
                $$string= $row[$string];
                
                
            }else{
                $$string= $connessione->real_escape_string($_REQUEST[$string]);
            }
            
            if(empty($$string)){
                $$string = " ";
            }
          
        }
        $sql = "UPDATE `persone` SET  `Cognome` = ?, `Nome` = ?, `PIVA` =?, `CFisc` = ?, `Indirizzo` = ?, `Civico` = ?, `CAP` = ?, `Localita` = ?, `Provincia` = ?, `Nazione` = ?, `NumeroTelefonico` = ?, `Email` = ? WHERE `persone`.`IDAnagrafica` = ? ";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("sssssisssssss", $Cognome, $Nome, $PIVA, $CFisc, $Indirizzo, $Civico, $CAP, $Localita, $Provincia, $Nazione, $NumeroTelefonico, $Email, $_SESSION['IDA']);
        $stmt->execute(); 
        
    }

    
    $inputType = array("s", "s", "s", "s", "s", "s", "s", "s", "sel1", "sel", "tel", "email");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
    
    <title>Document</title>
    <style>
        #main{
            display:grid;
            justify-content:center;
        }
        input{
            max-width:20vw;
        }
        select{
            max-width:20vw;
        }
        #card{
            display:flex;
            justify-content:center;
        }
        input{
            margin:0 auto;
            display:block;
        }
        #container {
            display: flex;
            justify-content: center; /* Can be changed in the live sample */
        }
    </style>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main" style="background-color: hsl(0, 0%, 96%);">
<section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-center">
      <div class="container align-items-center">
        <div class="row gx-lg-5 align-items-center">

            <div class="container">
                <div class="card" style=width:47vw;align-content:center>
                    <div>
                            <h1> Profilo Personale </h1><br>
                            <h3> Dettagli personali <h3><br>
                        <form method="POST" action="">
                            <div id="main">
                            <?php  
                            for($i = 0; $i < count($data); $i++){

                             ?>
                            <h4> <?= $data[$i] ?><h4> 

                    
                            <?php
                            if($inputType[$i] == "sel"){
                            ?>
                            <select name="Nazione" class="form-control" id="Nazione" style=justify-self:center >
                            <?php require("./addData/country_selector.php");?>
                            </select> <br>
                            <?php
                        }else if($inputType[$i] == "sel1"){
                            ?>
                            <select id="Provincia" class="form-control" name="Provincia" >
                            <?php require("./addData/selettore_provincia.php"); ?>
                            </select> <br>

                            <?php
                        }else if($inputType[$i] == "email"){
                            ?>
                            <input type="Email" id="<?= $data[$i]?>" class="form-control" name="Email" value="<?= $row[$data[$i]]?> " /><br>
                            <?php
                        }else{
                            ?>
                            <input type="text" class="form-control" id="<?= $data[$i]?>" name="<?= $data[$i]?>" value="<?= $row[$data[$i]]?>" />
                            <?php
                        }
                    }
                
                    ?>
                <br><input type="submit" class="btn btn-primary btn-block mb-4">
                        </div>
                </form>
            </div>
    </div>                
</body>
</html>
