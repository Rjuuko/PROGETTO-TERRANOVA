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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>FIVEHOUSE | Richiesta Contratto</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
    
    
<style>
    div.alert {
      padding: 20px;
      background-color: red;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
</style>
    

<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->
<body>
<?php 
        if(mysqli_num_rows($result) == 0 ){
             ?>
            <div style=display:block>
                <div style=display:flex;justify-content:center>
                    <h1> Sembra che tu non ancora abbia aggiunto nessuna sede </h1>
                    </div>
                <div style=display:flex;justify-content:center>
                <form action="addSede.php">
                    <input class="btn btn-primary btn-block mb-4" type="submit" value="Aggiungi Dati Sede" />
                </form>
                </div>
            </div>
             <?php

        }else{
            echo mysqli_num_rows($result);
            echo $_SESSION['IDA'];
            header("Location: ../login/email.php?text=2");
        }
    ?>
    </body>
</html>
