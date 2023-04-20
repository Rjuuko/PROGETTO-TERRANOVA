<?php
  session_start();
  require("../config.php");

  if(!isset($_SESSION['email'])){
    header("Location: login.php");
  }
  if(!isset($_SESSION['IDA'])){
    $sql = "SELECT IDAnagrafica FROM persone WHERE email = ?";
    $stmt2 = $connessione->prepare($sql);
    $stmt2->bind_param("s", $_SESSION['email']);
    $stmt2->execute();
    $result = $stmt2->get_result();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['IDA'] = $row['IDAnagrafica'];
    
  }
  $sql = "SELECT RagSoc FROM persone WHERE email = ?";
  $stmt = $connessione->prepare($sql);
  $stmt->bind_param("s", $_SESSION['email']);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_assoc($result);
  $RagSoc = $row['RagSoc'];
  if(!isset($RagSoc)){
    header("Location: addData/addInfo.php");
  }
  

 
  $sql = "SELECT S.Indirizzo, C.DataRichiestaServizio, C.DataInizioValidita, C.DataFineValidita, C.DescrizioneOfferta, C.Utility, C.StatoContratto, C.TipoPagamento, C.PotenzaImp, C.PotDisp, C.EnergiaAnno, C.GasAnno, C.UsoCotturaCibi, C.ProduzioneAcquaCaldaSanitaria, C.RiscaldamentoIndividuale, C.UsoCommerciale, RagSoc FROM persone AS P JOIN sede AS S ON P.IDAnagrafica = S.IDAnagrafica JOIN contratti AS C ON S.IDSede = C.IDSede WHERE email = ?;";
  $stmt = $connessione->prepare($sql); 
  $stmt->bind_param("s", $_SESSION['email']);
  $stmt->execute();
  $resultCon = $stmt->get_result();
  $rowCon = mysqli_fetch_assoc($resultCon);
  $temp = explode(" ", $RagSoc);
  $name = "";
  for($i = 0; $i < sizeof($temp); $i++){
    $name .=  ucfirst(strtolower($temp[$i]));
    $name .= " ";
  }

  $sql = "SELECT IDSede FROM sede WHERE IDAnagrafica = ?";
  $stmt = $connessione->prepare($sql);
  $stmt->bind_param("s", $_SESSION['IDA']);
  $stmt->execute();
  $result = $stmt->get_result();
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $sedeid = $row['IDSede'];
    $sql = "SELECT * FROM contratti AS C JOIN sede AS S ON C.IDSede = S.IDSede WHERE S.IDSede = ? ";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("s", $sedeid);
    $stmt->execute();
    $result = $stmt->get_result();
    $check = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
  }


  

  $sql = "SELECT S.Descrizione AS Descrizione, S.Indirizzo AS Indirizzo FROM contatti AS C JOIN contratti AS CO ON C.IDContratto = CO.IDRigaContratto JOIN persone AS P ON C.IDAnagraficaContatto = P.IDAnagrafica JOIN sede AS S ON CO.IDSede = S.IDSede WHERE P.email = '" . $_SESSION['email'] . "';";
  $contatti = $connessione->query($sql);



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>FIVEHOUSE | Homepage</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
  <body>
    
<header class="p-3 mb-3 border-bottom" style=background-color:rgb(47,47,47);>
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="navbar-brand d-flex align-items-center" style=color:lightgrey>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><img src="../immagini/leaf-svgrepo-com.svg"><circle cx="12" cy="13" r="4"/></svg>
        <strong>FiveHouse</strong>
      </a>
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <p style=color:lightgrey>
            <li><a href="#" class="nav-link px-2 link-light">Help</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Profile</a></li>
            <li><a href="#" class="nav-link px-2 link-light">Settings</a></li>
            <li><a href="./login/logout.php" class="nav-link px-2 link-light">Log Out</a></li>
          </p>
          </ul>
        </div>
      </div>
    </header>

<main>
      
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <?php 
        if($_SESSION['level'] == 1){
          ?>
            <h1 class="fw-light">Ciao Admin! </h1>
            <p class="lead text-muted">Aggiungi contratti qui!</p>
          <a href="./addData/addContract.php" class="btn btn-primary my-3"> Aggiungi contratto </a>
          <?php
        }else{

        
        ?>
        <h1 class="fw-light">Lista Contratti di <?= $name?></h1>
        <p class="lead text-muted">Qui sotto troverai la lista di tutti i contratti stipulati</p>
        
       <?php
        }
        ?>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <?php
      if($_SESSION['level'] != 1){
      if($resultCon->num_rows>0){
        ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        while($row = $resultCon->fetch_assoc()){
          ?>
          
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="<?= $row['Indirizzo']?>" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $row['Indirizzo']?></text></svg>
              <div class="card-body">
                <p class="card-text"></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Vedi</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Modifica</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Disdici</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php

        }
        
      }else{
        ?>
          <h3 style="text-align:center;"> Sembra che tu non abbia contratti, aggiungine uno ora! </h1>
          <a href="" class="btn btn-primary my-3"> Richiedi un Contratto</a>
        <?php
        
      }
    }
      if(mysqli_num_rows($contatti) > 0){
        echo"<h1> Contatti</h1>";
        while($row = $contatti->fetch_assoc()){

        
        ?>
        
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="<?= $row['Indirizzo']?>" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $row['Indirizzo']?></text></svg>
              <div class="card-body">
                <p class="card-text"> Di <?= $row['Descrizione']?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Vedi</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>
        
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p>
      <a href="./login/logout.php">Contattaci!</a>
    </p>
    </div>
</footer>


    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
