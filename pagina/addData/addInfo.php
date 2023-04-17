<?php
    require("../../config.php");
    session_start();
    if(!isset($_SESSION['email'])){
        echo "?";
        //header("Location: ../login.php");
    }
    //$attrList = array("Cognome", "Nome", "RagSoc", "PIVA", "CFisc", "Indirizzo", "Civico", "CAP", "Localita", "Provincia", "Nazione", "NumeroTelefonico", "Email");
    if(isset($_POST['Indirizzo'])){
        if(isset($_POST['nome'])){
            
            $nome = $connessione->real_escape_string($_POST['nome']);
            $cognome = $connessione->real_escape_string($_POST['cognome']);
            $RagSoc = $connessione->real_escape_string($cognome . " " . $nome);
            if(empty($RagSoc) || empty($nome) || empty($cognome)){
                header("Location:addInfo.php");
            }
        }else{
            $PIVA = $connessione->real_escape_string($_POST['Piva']);
            if(empty($PIVA)){
                header("Location:addInfo.php");
            }
        }
        $CFisc = $connessione->real_escape_string($_POST['cfisc']);
        $Indirizzo = $connessione->real_escape_string($_POST['Indirizzo']);
        $Civico = $connessione->real_escape_string($_POST['Civico']);
        $CAP = $connessione->real_escape_string($_POST['CAP']);
        $Localita = $connessione->real_escape_string($_POST['Loc']);
        $Provincia = $connessione->real_escape_string($_POST['province']);
        $Nazione = $connessione->real_escape_string($_POST['country']);
        $NumeroTelefonico = $connessione->real_escape_string($_POST['NTel']);
        $email = $connessione->real_escape_string($_SESSION['email']);


        if(empty($Indirizzo) || empty($Civico) || empty($CAP) || empty($Localita) || empty($Provincia) || empty($Nazione)){
            header("Location: addInfo.php");
        }
        $sql = " INSERT INTO `persone` (`Cognome`, `Nome`, `RagSoc`, `PIVA`, `CFisc`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`, `NumeroTelefonico`, `Email`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("ssssssissssss", $cognome, $nome, $RagSoc, $PIVA, $CFisc, $Indirizzo, $Civico, $CAP, $Localita, $Provincia, $Nazione, $NumeroTelefonico, $email);
        $stmt->execute();

        $sql = "SELECT idAnagrafica FROM persone WHERE email = ?";
        $stmt2 = $connessione->prepare($sql);
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $row = mysqli_fetch_assoc($result);

        
        $IndirizzoS = $_POST['IndirizzoSede'];
        $CivicoS = $_POST['CivicoSede'];
        $CAPSede = $_POST['CAPSede'];
        $LocalitaS = $_POST['LocSede'];
        $ProvinciaS = $_POST['provinceSede'];
        $NazioneS = $_POST['countrySede'];

        if(empty($IndirizzoS) || empty($CivicoS) || empty($CAPSede) || empty($LocalitaS) || empty($ProvinciaS) || empty($NazioneS)){
            header("Location: addInfo.php");
        }
        $sql = "INSERT INTO Sede (`IDAnagrafica`, `Descrizione`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt3 = $connessione->prepare($sql);
        $stmt3->bind_param("ssssssss", $row['idAnagrafica'], $RagSoc, $IndirizzoS, $CivicoS, $CAPSede, $LocalitaS, $ProvinciaS, $NazioneS);
        $stmt3->execute();
        
        header("Location: ../index.php");
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
        .tab{
            display: none;
        }
        #company{
            .form.control;
        }
        #private{
            .form.control;
        }
    </style>

    
</head>     
<body class="card">
    <form action="" method="POST" id="regForm" class="box">
    <section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                    <legend>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class="my-5 display-3 fw-bold ls-tight">Form
                            </h1>
                          </div>
                        <!-- Prima pagina del form dove si sceglie se si è azienda o privato -->
                        <div class="tab"> 
                            <input class="form-control" type="button" name="azienda" id="azienda" value="azienda" onclick="isCompany(1)">
                            <input class="form-control"  type="button" name="privato" id="privato" value="privato" onclick="isCompany(0)">
                        </div>
                        <!-- Seconda pagina dove l'utente dovrà immettere i propri dati -->
                        <div class="tab"> 
                            <div id="private">
                                <label for="nome" > Nome* </label> <br>
                                <input class=" form-control" type="text" name="nome" id="nome" placeholder="Nome" > 
                                
                                <label for="cognome" > Cognome* </label> <br>
                                <input class=" form-control" type="text" name="cognome" id="cognome" placeholder="Cognome" > 
                            </div>
                            
                            <label for="cfisc" > Codice Fiscale </label> <br>
                            <input class="form-control" type="text" name="cfisc" id="cfisc" placeholder="Codice Fiscale"> 
                            <div id="company">
                                <label for="RagSoc" > Nome azienda *</label> <br>
                                <input class=" form-control" type="text" name="RagSoc" id="RagSoc" placeholder="Nome Azienda" > 

                                <label for="Piva" > Partita IVA*</label> <br>
                                <input class=" form-control" type="text" name="Piva" id="Piva" placeholder="Partita IVA"> 
                            </div>
                            <label for="Indirizzo"> Indirizzo* </label> <br>
                            <input class="form-control" type="text" name="Indirizzo" id="Indirizzo" placeholder="Indirizzo" required> 
                            
                            <label for="Civico"> Civico* </label> <br>
                            <input class="form-control" type="text" name="Civico" id="Civico" placeholder="Civico" required> 

                            <label for="CAP"> CAP* </label> <br>
                            <input class="form-control" type="text" name="CAP" id="CAP" placeholder="CAP" required>  
                            
                            <label for="Loc"> Località* </label><br>
                                <!-- To be replaced with a dropdown select -->
                            <input class="form-control" type="text" name="Loc" id="Loc" placeholder="Località" required>  
                            
                            <label for="Provincia"> Provincia* </label> <br>
                            <!-- To be replaced with a dropdown select --> 
                            <select id="province" class="form-control" name="province" form="regForm" required>
                            <?php require("selettore_provincia.php"); ?> 
                            </select> 
                            
                            <label for="country"> Nazione* </label> <br>
                                <!-- To be replaced with a dropdown select -->
                            <select name="country" class="form-control" id="country" required>
                            <?php require("country_selector.php");?> 
                            </select> 

                            <label for="NTel"> Numero di telefono* </label> <br>
                            <input class="form-control"  type="text" name="NTel" id="NTel" placeholder="Numero Telefonico" required> <br>
                        
                        </div>

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
                

                        </div>
                        <div style="overflow:auto; margin: auto;">
                            <div>
                                <button class="btn btn-primary btn-block mb-4" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-primary btn-block mb-4" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </form>
    <script src="index.js"></script>
    <script>
        var currentTab = 0; 
        showTab(0); 
    </script>
</body>
</html>
