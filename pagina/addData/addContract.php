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
    
    <script>
    function getMinDate(){
        
        var datePickerId = document.getElementById("StartDate")
        datePickerId.min = new Date().toISOString().split("T")[0];
        
    }
    </script>

    
</head>     
<body class="card" onload="getMinDate()">
    <form action="" method="POST" id="regForm" class="box">
    <section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container align-items-center">
        <div class="row gx-lg-5 align-items-center">

            <div class="card">
              <div class="card-body py-5 px-md-5" style="align-content:center">
                        <!-- Prima pagina del form dove si sceglie se si è azienda o privato -->
                        <!-- Seconda pagina dove l'utente dovrà immettere i propri dati -->
                        <form class="container">    
                            <center>
                                <label for="StartDate" > Data inizio contratto</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="date" name="StartDate" id="StartDate" required> 
                                <label for="EndDate" > Data scadenza</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="date" name="EndDate" id="EndDate" required> 
                                <label for="RagSoc" > compagnia</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="text" name="RagSoc" id="RagSoc" placeholder="Nome Contratto" required> 
                                <label for="RagSoc" > codice utente</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="text" name="RagSoc" id="RagSoc" placeholder="Nome Contratto" required> 
                                <label for="RagSoc" > Descrizione</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="text" name="RagSoc" id="RagSoc" placeholder="descrizione" required> 
                                <label for="RagSoc" > utility</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="text" name="RagSoc" id="RagSoc" placeholder="Utility" required> 
                                <label for="RagSoc" > tipo di pagamento</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="text" name="RagSoc" id="RagSoc" placeholder="tipo di pagamento" required> 
                                <label for="RagSoc" > stato contratto</label> <br>
                                <select name="country" class="form-control" style=width:30vw;height:3rem; id="country" required="">
                            
                                    <option value="0" label="Select an option..." selected="selected"></option>
                                    <optgroup id="country-optgroup-Africa" label="opzioni">
                                        <option value="Open" label="Aperto"></option>
                                        <option value="Closed" label="Chiuso"></option> 
                                    </optgroup>
                                </option>
                                </select>
                                <label for="PImp" > Potenza imp</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="potenza imp" required>
                                <label for="PImp" > Potenza Disp</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="potenza Disp" required> 
                                <label for="PImp" > Energia annuale espressa in {unità di misura}</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="Energia" required> 
                                <label for="PImp" > Gas Annuo</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="Gas Annuo" required> 
                                <label for="PImp" > Produzione di acqua calda sanitaria</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="" required> 
                                <label for="PImp" >Riscaldamento individuale</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="Energia destinata all'uso individuale" required>
                                <label for="PImp" >uso commerciale</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="number" name="PImp" id="PImp" placeholder="Energia destinata all'uso commerciale" required>
                                <br>
                                <button class="btn btn-primary btn-block mb-4" type="button" id="prevBtn">Annulla</button>
                                <button class="btn btn-primary btn-block mb-4" type="button" id="nextBtn">Conferma</button> 
                            </center>
                            </form>
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
    
</body>
</html>
