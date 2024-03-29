<?php
session_start();
require("../config.php");
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
$sql = "SELECT C.EnergiaAnno FROM persone AS P JOIN sede AS S ON P.IDAnagrafica = S.IDAnagrafica JOIN contratti AS C ON S.IDSede = C.IDSede WHERE email = ?;";
  $stmt = $connessione->prepare($sql); 
  $stmt->bind_param("s", $_SESSION['email']);
  $stmt->execute();
  $resultCon = $stmt->get_result();
    $row = mysqli_fetch_assoc($resultCon);

  $carbon_footprint = "";
// Ottieni i dati dal form
if(isset($_POST['trasporti'])){
    @$energia = $row['EnergiaAnno'];
    $trasporti = $_POST['trasporti'];
    $alimentazione = $_POST['alimentazione'];
    $acquisti = $_POST['acquisti'];
    
    // Calcola il carbon footprint
    $emissioni_energia = $energia * 0.5; // 0.5 kg CO2eq per kWh di energia
    $emissioni_trasporti = $trasporti * 0.2; // 0.2 kg CO2eq per km in auto
    $emissioni_alimentazione = $alimentazione * 3.5; // 3.5 kg CO2eq per kg di carne e latticini
    $emissioni_acquisti = $acquisti * 0.1; // 0.1 kg CO2eq per euro di spesa
    
    $carbon_footprint = $emissioni_energia + $emissioni_trasporti + $emissioni_alimentazione + $emissioni_acquisti;
    
    // Mostra il risultato
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Calcolo CarbonFootprint</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
    
    
 

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Section: Design Block -->


<section class="section">
    <div class="px-4 py-5 px-md-5 text-center text-lg-center" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">


              <h1>Calcolo del Carbon Footprint</h1>
	<form action="" method="post">
	
		<h2>Trasporti</h2>
		<p>Quanti chilometri percorri in auto o in altri mezzi di trasporto?</p>
		<input type="number" name="trasporti" id="trasporti" required>
		<select name="unita" id="unita">
			<option value="km">Chilometri</option>
			<option value="miglia">Miglia</option>
		</select>
		<br><br>
		<h2>Alimentazione</h2>
		<p>Quanto mangi di carne, latticini e altri alimenti ad alta intensità di carbonio?</p>
		<input type="number" name="alimentazione" id="alimentazione" required>
		<select name="unita" id="unita">
			<option value="kg">Kilogrammi</option>
			<option value="ton">Tonnelate</option>
		</select>
		<br><br>
		<h2>Acquisti</h2>
		<p>Quanto spendi in beni di consumo come vestiti e prodotti elettronici?</p>
		<input type="number" name="acquisti" id="acquisti" required>
		<select name="unita" id="unita">
			<option value="euro">Euro</option>
			<option value="dollari">Dollari</option>
		</select>
		<br><br>
		<input type="submit" value="Calcola">
	</form>
    <p> Il tuo carbon footprin è di <?=$carbon_footprint?>
  

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>