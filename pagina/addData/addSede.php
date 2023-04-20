<?php
    require("../../config.php");
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }

    if(isset($_POST['IndirizzoSede'])){

    
    $IndirizzoS = $_POST['IndirizzoSede'];
    $CivicoS = $_POST['CivicoSede'];
    $CAPSede = $_POST['CAPSede'];
    $LocalitaS = $_POST['LocSede'];
    $ProvinciaS = $_POST['provinceSede'];
    $NazioneS = $_POST['countrySede'];

    echo $IndirizzoS . '<br>';
    echo $CivicoS . '<br>';
    echo $CAPSede . '<br>';
    echo $LocalitaS . '<br>';
    echo $ProvinciaS . '<br>';
    echo $NazioneS . '<br>';
    echo $_SESSION['IDA'] . '<br>';
    echo $_SESSION['RagSoc'] . '<br>';
    $sql = "INSERT INTO Sede (`IDAnagrafica`, `Descrizione`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt3 = $connessione->prepare($sql);
    $stmt3->bind_param("ssssssss", $_SESSION['IDA'], $_SESSION['RagSoc'], $IndirizzoS, $CivicoS, $CAPSede, $LocalitaS, $ProvinciaS, $NazioneS);
    $stmt3->execute();
    //header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

    

<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->
    <style>
        #company{
            .form.control;
        }
        #private{
            .form.control;
        }
    </style>

    
</head>    
<body class="card">
    <section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                    <legend>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class="my-5 display-4 fw-bold ls">Dati Sede
                            </h1>
                          </div>
                        
                        <form action="" method="POST">
                        <div class="tab">  

                            <label for="IndirizzoSede"> Indirizzo* </label> <br>
                            <input class="form-control"  type="text" name="IndirizzoSede" id="IndirizzoSede" placeholder="IndirizzoSede" required> 
                            
                            <label for="CivicoSede"> Civico* </label> <br>
                            <input class="form-control"  type="text" name="CivicoSede" id="CivicoSede" placeholder="CivicoSede" required>
                            
                            <label for="CAPSede"> CAP* </label> <br>
                            <input class="form-control" type="text" name="CAPSede" id="CAPSede" placeholder="CAP" required> 

                            <label for="LocSede"> Località* </label> <br>
                                <!-- To be replaced with a dropdown select -->
                            <input class="form-control"  type="text" name="LocSede" id="LocSede" placeholder="Localita Sede" required>  
                            
                            <label for="provinceSede"> Provincia* </label> <br>
                            <!-- To be replaced with a dropdown select --> 
                            <select id="provinceSede" class="form-control" name="provinceSede" required>
                            <?php require("selettore_provincia.php"); ?>
                            </select> 

                            <label for="countrySede"> Nazione* </label> <br>
                                <!-- To be replaced with a dropdown select -->
                            <select name="countrySede" class="form-control" id="country" required>
                            <?php require("country_selector.php");?>
                            </select> <br>
                            <input type="submit" value="conferma" class="btn btn-primary btn-block mb-4">
                        </div>
                        </form>

                        </div>
                        
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>

</body>
</html>