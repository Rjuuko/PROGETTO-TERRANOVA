<?php
    require("../../config.php");
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }
    
    
    if(isset($_REQUEST['Anag'])){

    
        $Anagrafica = $connessione->real_escape_string($_REQUEST['Anag']);
        $sql = "SELECT IDSede FROM sede WHERE IDAnagrafica = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $Anagrafica);
        $stmt->execute();
        $result = $stmt->get_result();
        //$row = $stmt

        $StartDate = $connessione->real_escape_string($_REQUEST['StartDate']);
        $EndDate = $connessione->real_escape_string($_REQUEST['EndDate']);
        $Date = date("Y-m-d", strtotime($StartDate. ' + ' . $EndDate . ' days'));
        $OType = $connessione->real_escape_string($_REQUEST['TipoOff']);
        $Utility = $connessione->real_escape_string($_REQUEST['Utility']);
        $PType = $connessione->real_escape_string($_REQUEST['PType']);
        $PImp = $connessione->real_escape_string($_REQUEST['PImp']);
        $PDisp = $connessione->real_escape_string($_REQUEST['PDisp']);
        $EAnno = $connessione->real_escape_string($_REQUEST['EAnno']);
        $GAnno = $connessione->real_escape_string($_REQUEST['GAnno']);
        $usoCott = $connessione->real_escape_string($_REQUEST['usoCott']);
        $usoAcq = $connessione->real_escape_string($_REQUEST['usoAcq']);
        $Risc = $connessione->real_escape_string($_REQUEST['Risc']);
        $usoComm = $connessione->real_escape_string($_REQUEST['usoCom']);
        $Status = "In Lavorazione";

        $sql = "INSERT INTO `contratti` ( `IDSede`,  `DataInizioValidita`, `DataFineValidita`, `DescrizioneOfferta`, `Utility`, `StatoContratto`, `TipoPagamento`, `PotenzaImp`, `PotDisp`, `EnergiaAnno`, `GasAnno`, `UsoCotturaCibi`, `ProduzioneAcquaCaldaSanitaria`, `RiscaldamentoIndividuale`, `UsoCommerciale`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("issssssddddiiii", $Anagrafica, $StartDate, $Date, $OType, $Utility, $Status , $PType, $PImp, $PDisp, $EAnno, $GAnno, $usoCott, $usoAcq, $Risc, $usoComm);
        $stmt->execute();
        header("Location: ../index.php");
    }


    $result = $connessione->query("SELECT IDSede, S.Indirizzo AS Indirizzo,  RagSoc FROM sede AS S JOIN persone AS P ON S.IDAnagrafica = P.IDAnagrafica");

    
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
    
    <script>
    function getMinDate(){
        
        var datePickerId = document.getElementById("StartDate")
        datePickerId.min = new Date().toISOString().split("T")[0];
        
    }
    </script>

    
</head>     
<body class="card" onload="getMinDate()">

    <section class="section" >
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container align-items-center">
        <div class="row gx-lg-5 align-items-center">

            <div class="card">
              <div class="card-body py-5 px-md-5" style="align-content:center">
                        <!-- Prima pagina del form dove si sceglie se si è azienda o privato -->
                        <!-- Seconda pagina dove l'utente dovrà immettere i propri dati -->
                        <form class="container" action="" method="POST">    
                            <center>
                            <select name="Anag" class="form-control" style=width:30vw;height:3rem; id="Anag" required>                
                                <option value="0" label="Select an option..." selected="selected"></option>
                                    <optgroup id="country-optgroup-Africa" label="Lista di nomi:">
                                    <!-- inserire ciclo per ogni nome di persona con contratto indata sede -->
                                    <?php
                                    if($result->num_rows>0){

                                    
                                    while($row = $result->fetch_assoc()){
                                        if(!empty($row['RagSoc'])){
                                         echo "<option value=". $row['IDSede'] ."> " .$row['RagSoc'] . " - " . $row['Indirizzo']. "</option>";
                                        }
                                        }
                                    }
                                    ?>
                                    
                                    </optgroup>
                                </option>
                            </select>
                                <label for="StartDate" > Data inizio contratto</label> <br>
                                <input class=" form-control"style=width:30vw;height:3rem; type="date" name="StartDate" id="StartDate" required> 
                                <label for="EndDate"> Durata Contratto </label> <br>
                                <input class=" form-control" style=width:30vw;height:3rem; type="number" min="30" value="30" name="EndDate" id="EndDate" required>
                                <label for="TipoOff"> Tipo Offerta </label> <br>
                                <select id="TipoOff" name="TipoOff" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="Easy Energy"> Easy Energy </option>
                                    <option value="Family"> Family </option>
                                    <option value="Full Power"> Full Power </option>
                                    <option value="Super Power"> Super Power </option>
                                </select>
                                <label for="Utility"> Utility</label> <br>
                                <select id="Utility" name="Utility" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="EE"> Energia </option>
                                    <option value="EE/GAS"> Energia / GAS </option>
                                    <option value="GAS"> GAS </option>
                                </select>
                                <label for="PType" > tipo di pagamento</label> <br>
                                <select id="PType" name="PType" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="Bonifico"> Bonifico </option>
                                    <option value="Bollettino"> Bollettino </option>
                                    <option value="Carta di credito"> Carta di Credito </option>
                                </select>
                                
                                <label for="PImp"> Potenza Imp </label> <br>
                                <input class=" form-control" style=width:30vw;height:3rem; step="0.1" type="number" min="0"  name="PImp" id="PImp" >

                                <label for="PDisp"> Potenza Disp </label> <br>
                                <input class=" form-control" style=width:30vw;height:3rem; step="0.1" type="number" min="0"  name="PDisp" id="PDisp" >

                                <label for="EAnno"> Energia Anno </label> <br>
                                <input class=" form-control" style=width:30vw;height:3rem; type="number" min="0"  name="EAnno" id="EAnno" >

                                <label for="GAnno"> Gas Anno </label> <br>
                                <input class=" form-control" style=width:30vw;height:3rem; type="number" min="0"  name="GAnno" id="GAnno" >

                                <label for="usoCott" >uso cottura cibi</label> <br>
                                <select id="usoCott" name="usoCott" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="1"> Si </option>
                                    <option value="0"> No </option>
                                </select>

                                <label for="usoAcq" >Produzione Acqua Calda Sanitaria</label> <br>
                                <select id="usoAcq" name="usoAcq" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="1"> Si </option>
                                    <option value="0"> No </option>
                                </select>

                                <label for="Risc" >Riscaldamento Individuale</label> <br>
                                <select id="Risc" name="Risc" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="1"> Si </option>
                                    <option value="0"> No </option>
                                </select>

                                <label for="usoCom" >uso commerciale</label> <br>
                                <select id="usoCom" name="usoCom" class="form-control" style=width:30vw;height:3rem;>
                                    <option selected disabled hidden> Scegli l'opzione ...</option>
                                    <option value="1"> Si </option>
                                    <option value="0"> No </option>
                                </select>
                                <br>

                                <button class="btn btn-primary btn-block mb-4" type="submit" id="nextBtn">Conferma</button> 
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

    
</body>
</html>
