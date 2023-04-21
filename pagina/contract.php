<?php
    require("../config.php");
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }
    
    $Contract = $_GET['id'];
    
    $sql = "SELECT * FROM contratti WHERE IDRigaContratto = " . $Contract;
    $result = $connessione->query($sql);
    $row = mysqli_fetch_assoc($result);

    $data = array( "DataRichiestaServizio", "DataInizioValidita", "DataFineValidita", "DescrizioneOfferta", "Utility", "StatoContratto", "TipoPagamento", "PotenzaImp", "PotDisp", "EnergiaAnno", "GasAnno", "UsoCotturaCibi", "ProduzioneAcquaCaldaSanitaria", "RiscaldamentoIndividuale", "UsoCommerciale");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIVEHOUSE | Contratto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    <style>
        input[type==email] {
        margin:0 auto;
        display:block;
        }
        #container {
            display: flex;
            justify-content: space-between; /* Can be changed in the live sample */
        }
        /* #main{
            display: flex;
  justify-content: space-between;
        } */
    </style>

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>     
<body class="card" onload="getMinDate()">

    <section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-center" style="background-color: hsl(0, 0%, 96%);">
      <div class="container align-items-center">
        <div class="row gx-lg-5 align-items-center">

            <div class="container" id="container">
                <div class="card" style=width:47vw>
                    <div class="-body py-5 px-md-5">
                        <h1> Contratto </h1>
                        <form method="POST" action="./addData/addContact.php?id=<?= $Contract?>">
                            <label for="email">Email Contatto</label>
                            <div style=display:flex;justify-content:center>
                                <input type="email" id="email" name="email" class="form-control" style=max-width:20vw;max-height:3vw; required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4" style=position:relative;align-self:center;margin-top:1.5vw>Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card" style=width:47vw>
                    <div class="-body py-5 px-md-5">
                        <?php
                        for($i = 0; $i < count($data); $i++){
                        ?>
                        <div>
                            <h3><?= $data[$i]?></h3>
                            <?php
                                if(empty($row[$data[$i]])){
                            ?>
                            <p> /</p>
                             <?php
                                }else{
                            ?>
                            <p><?= $row[$data[$i]]?></p>
                            <?php
                             }
                            ?>
                                
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    
</body>
</html>
