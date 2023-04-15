

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
    <script src="index.js"></script>
    <script>
        var currentTab = 0; 
        showTab(0); 
    </script>
    
</head>
<body>
    <form action="" method="POST">
        <!-- Prima pagina del form dove si sceglie se si è azienda o privato -->
        <div class="tab">
            <input type="button" name="azienda" id="azienda" value="azienda">
            <input type="button" name="privato" id="privato" value="privato">
        </div>
        <!-- Seconda pagina dove l'utente dovrà immettere i propri dati -->
        <div class="tab">
            <label for="nome"> Nome </label>
            <input type="text" name="nome" id="nome" placeholder="nome">
            
            <label for="cognome"> Cognome </label>
            <input type="text" name="cognnome" id="cognnome" placeholder="cognome">
            
            <label for="cfisc"> Codice Fiscale </label>
            <input type="text" name="cfisc" id="cfisc" placeholder="Codice Fiscale">
            
            <label for="Indirizzo"> Indirizzo </label>
            <input type="text" name="Indirizzo" id="Indirizzo" placeholder="Indirizzo">
            
            <label for="Civico"> Civico </label>
            <input type="text" name="Civico" id="Civico" placeholder="Civico">
            
            <label for="Loc"> Località </label>
                <!-- To be replaced with a dropdown select -->
            <input type="text" name="Loc" id="Loc" placeholder="Loc"> 
            
            <label for="Provincia"> Provincia </label>
               <!-- To be replaced with a dropdown select --> 
            <input type="text" name="Provincia" id="Provincia" placeholder="Provincia">
            
            <label for="Nazione"> Nazione </label>
                <!-- To be replaced with a dropdown select -->
            <input type="text" name="Nazione" id="Nazione" placeholder="Nazione">

            <label for="NTel"> Numero di telefono </label>
            <input type="text" name="NTel" id="NTel" placeholder="Numero Telefonico">
        
        </div>

        <div class="tab">
            
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
</body>
</html>