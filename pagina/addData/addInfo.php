<?php
    require("../../config.php");
    $attrList = array("Cognome", "Nome", "RagSoc", "PIVA", "CFisc", "Indirizzo", "Civico", "CAP", "Localita", "Provincia", "Nazione", "NumeroTelefonico", "Email");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        .tab{
            display: none;
        }
    </style>

    
</head>
<body>
    <form action="" method="POST" id="regForm">
        <!-- Prima pagina del form dove si sceglie se si è azienda o privato -->
        <div class="tab"> Test:
            <input type="button" name="azienda" id="azienda" value="azienda" onclick="isCompany(1)" >
            <input type="button" name="privato" id="privato" value="privato" onclick="isCompany(0)">
        </div>
        <!-- Seconda pagina dove l'utente dovrà immettere i propri dati -->
        <div class="tab"> Test:
            <label for="nome" class="private"> Nome </label>
            <input type="text" name="nome" id="nome" placeholder="nome" class="private">
            
            <label for="cognome" class="private"> Cognome </label>
            <input type="text" name="cognnome" id="cognnome" placeholder="cognome" class="private">
            
            <label for="cfisc" class="private"> Codice Fiscale </label>
            <input type="text" name="cfisc" id="cfisc" placeholder="Codice Fiscale" class="private">
            
            <label for="RagSoc" class="company"> Nome azienda </label>
            <input type="text" name="RagSoc" id="RagSoc" placeholder="Nome Azienda" class="company">

            <label for="Piva" class="company"> Partita IVA</label>
            <input type="text" name="Piva" id="Piva" placeholder="Partita IVA" class="company">

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
            <input type="text" name="NTel" id="NTel" placeholder="Numero Telefonico">
        
        </div>

        <div class="tab"> Inserisci i dati della sede: 

            <label for="IndirizzoSede"> Indirizzo </label>
            <input type="text" name="IndirizzoSede" id="IndirizzoSede" placeholder="IndirizzoSede">
            
            <label for="CivicoSede"> Civico </label>
            <input type="text" name="CivicoSede" id="CivicoSede" placeholder="CivicoSede">
            
            <label for="LocSede"> Località </label>
                <!-- To be replaced with a dropdown select -->
            <input type="text" name="LocSede" id="LocSede" placeholder="LocSede"> 
            
            <label for="ProvinciaSede"> Provincia </label>
               <!-- To be replaced with a dropdown select --> 
            <input type="text" name="ProvinciaSede" id="ProvinciaSede" placeholder="ProvinciaSede">
            
            <label for="NazioneSede"> Nazione </label>
                <!-- To be replaced with a dropdown select -->
            <input type="text" name="NazioneSede" id="NazioneSede" placeholder="NazioneSede"> 
        </div>
  

        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
    <script src="index.js"></script>
    <script>
        var currentTab = 0; 
        showTab(0); 
    </script>
</body>
</html>