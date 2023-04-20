<?php
     session_start();
     require("../../config.php");
   
     if(!isset($_SESSION['email'])){
       header("Location: login.php");
     }
   
    $IDContratto = $connessione->real_escape_string($_REQUEST['id']);
    $Email = $connessione->real_escape_string($_REQUEST['email']);
    
    $sql = "SELECT IDAnagrafica FROM persone WHERE email = '" . $Email . "';";
    $result = $connessione->query($sql);
    $row = mysqli_fetch_assoc($result);
    $IDAnagrafica = $row['IDAnagrafica'];

    $sql = "INSERT INTO `contatti` (`IDContratto`, `IDAnagraficaContatto`) VALUES (?, ?) ";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("ii", $IDContratto, $IDAnagrafica);
    $stmt->execute();
    
?>