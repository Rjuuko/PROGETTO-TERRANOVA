<?php
    require("../../config.php");
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }

    if(isset($_POST['IndirizzoSdee'])){

    
    $IndirizzoS = $_POST['IndirizzoSede'];
    $CivicoS = $_POST['CivicoSede'];
    $CAPSede = $_POST['CAPSede'];
    $LocalitaS = $_POST['LocSede'];
    $ProvinciaS = $_POST['provinceSede'];
    $NazioneS = $_POST['countrySede'];

    $_SESSION['IDA'] = $row['idAnagrafica'];
    if(empty($IndirizzoS) || empty($CivicoS) || empty($CAPSede) || empty($LocalitaS) || empty($ProvinciaS) || empty($NazioneS)){
        header("Location: addInfo.php");
    }
    $sql = "INSERT INTO Sede (`IDAnagrafica`, `Descrizione`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt3 = $connessione->prepare($sql);
    $stmt3->bind_param("ssssssss", $row['idAnagrafica'], $RagSoc, $IndirizzoS, $CivicoS, $CAPSede, $LocalitaS, $ProvinciaS, $NazioneS);
    $stmt3->execute();
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
    <form action="" method="POST">
        <div class="tab"> Inserisci i dati della sede: <br>

            <label for="IndirizzoSede"> Indirizzo* </label> <br>
            <input class="form-control"  type="text" name="IndirizzoSede" id="IndirizzoSede" placeholder="IndirizzoSede" required> 

            <label for="CivicoSede"> Civico* </label> <br>
            <input class="form-control"  type="text" name="CivicoSede" id="CivicoSede" placeholder="CivicoSede" required>

            <label for="CAPSede"> CAP* </label> <br>
            <input class="form-control" type="text" name="CAPSede" id="CAPSede" placeholder="CAP" required> 

            <label for="LocSede"> Località* </label> <br>
                <!-- To be replaced with a dropdown select -->
            <input class="form-control"  type="text" name="LocSede" id="LocSede" placeholder="LocSede" required>  

            <label for="provinceSede"> Provincia* </label> <br>
            <!-- To be replaced with a dropdown select --> 
            <select id="provinceSede" class="form-control" name="provinceSede" required>
            <?php require("selettore_provincia.php"); ?>
            </select> <br>

            <label for="countrySede"> Nazione* </label> <br>
                <!-- To be replaced with a dropdown select -->
            <select name="countrySede" class="form-control" id="country" required>
            <?php require("country_selector.php");?>
            </select> <br>
        </div>
    </form>
</body>
</html>