<?php
    require("../../config.php");
    session_start();
    if(isset($_SESSION['email'])){
        echo "?";
        //header("Location: ../login.php");
    }
    //$attrList = array("Cognome", "Nome", "RagSoc", "PIVA", "CFisc", "Indirizzo", "Civico", "CAP", "Localita", "Provincia", "Nazione", "NumeroTelefonico", "Email");
    if(isset($_POST['Indirizzo'])){
        if(isset($_POST['nome'])){
            $nome = $connessione->real_escape_string($_POST['nome']);
            $cognome = $connessione->real_escape_string($_POST['cognome']);
            $RagSoc = $connessione->real_escape_string($cognome . $nome);
        }else{
            $PIVA = $connessione->real_escape_string($_POST['Piva']);
        }
        $CFisc = $connessione->real_escape_string($_POST['cfisc']);
        $Indirizzo = $connessione->real_escape_string($_POST['Indirizzo']);
        $Civico = $connessione->real_escape_string($_POST['Civico']);
        $CAP = $connessione->real_escape_string($_POST['CAP']);
        $Localita = $connessione->real_escape_string($_POST['Localita']);
        $Provincia = $connessione->real_escape_string($_POST['Province']);
        $Nazione = $connessione->real_escape_string($_POST['Country']);
        $NumeroTelefonico = $connessione->real_escape_string($_POST['NTel']);
        $email = $connessione->real_escape_string($_SESSION['email']);


        $sql = " INSERT INTO `persone` (`Cognome`, `Nome`, `RagSoc`, `PIVA`, `CFisc`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`, `NumeroTelefonico`, `Email`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("ssssssissssss", $cognome, $nome, $RagSoc, $PIVA, $CFisc, $Indirizzo, $Civico, $CAP, $Localita, $Provincia, $Nazione, $NumeroTelefonico, $email);
        $stmt->execute();
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
                <form method="POST" action='login/authentication.php'>
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
                            <label for="nome" class="private"> Nome </label>
                            <input class="private form-control" type="text" name="nome" id="nome" placeholder="nome" class="private">
                            
                            <label for="cognome" class="private"> Cognome </label>
                            <input class="private form-control" type="text" name="cognnome" id="cognnome" placeholder="cognome" class="private">
                            
                            <label for="cfisc" class="private"> Codice Fiscale </label>
                            <input class="private form-control" type="text" name="cfisc" id="cfisc" placeholder="Codice Fiscale" class="private">
                            
                            <label for="RagSoc" class="company"> Nome azienda </label>
                            <input class="company form-control" type="text" name="RagSoc" id="RagSoc" placeholder="Nome Azienda" class="company">

                            <label for="Piva" class="company"> Partita IVA</label>
                            <input class="company form-control" type="text" name="Piva" id="Piva" placeholder="Partita IVA" class="company">

            <label for="Indirizzo"> Indirizzo </label>
            <input type="text" name="Indirizzo" id="Indirizzo" placeholder="Indirizzo">
            
            <label for="Civico"> Civico </label>
            <input type="text" name="Civico" id="Civico" placeholder="Civico">
            
            <label for="Loc"> Località </label>
                <!-- To be replaced with a dropdown select -->
            <input type="text" name="Loc" id="Loc" placeholder="Loc"> 
            
            <label for="Provincia"> Provincia </label>
               <!-- To be replaced with a dropdown select --> 
            <?php require("selettore_provincia.php"); ?>
            
            <label for="Nazione"> Nazione </label>
                <!-- To be replaced with a dropdown select -->
            <?php require("country_selector.php");?>

                            <label for="NTel"> Numero di telefono </label>
                            <input class="form-control"  type="text" name="NTel" id="NTel" placeholder="Numero Telefonico">
                        
                        </div>

                        <div class="tab"> Inserisci i dati della sede: 

                            <label for="IndirizzoSede"> Indirizzo </label>
                            <input class="form-control"  type="text" name="IndirizzoSede" id="IndirizzoSede" placeholder="IndirizzoSede">
                            
                            <label for="CivicoSede"> Civico </label>
                            <input class="form-control"  type="text" name="CivicoSede" id="CivicoSede" placeholder="CivicoSede">
                            
                            <label for="LocSede"> Località </label>
                                <!-- To be replaced with a dropdown select -->
                            <input class="form-control"  type="text" name="LocSede" id="LocSede" placeholder="LocSede"> 
                            
                            <label for="ProvinciaSede"> Provincia </label>
                            <!-- To be replaced with a dropdown select --> 
                            <input class="form-control"  type="text" name="ProvinciaSede" id="ProvinciaSede" placeholder="ProvinciaSede">
                            
                            <label for="NazioneSede"> Nazione </label>
                                <!-- To be replaced with a dropdown select -->
                            <input class="form-control"  type="text" name="NazioneSede" id="NazioneSede" placeholder="NazioneSede"> 
                        </div>
                

                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-primary btn-block mb-4" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-primary btn-block mb-4" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        </div>
                        </form>
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
