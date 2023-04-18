<?php
    include("../config.php");
    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }

    $sql = "SELECT IDSede FROM sede WHERE IDAnagrafica = ?";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("s", $_SESSION['IDA']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    $sedeid = $row['IDSede'];

    $sql = "SELECT * FROM contratti WHERE IdSede = ?";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("s", $sedeid);
    $stmt->execute();
    $result = $stmt->get_result();
    $check = mysqli_num_rows($result)
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

</head>
<body>
    <?php
        include("header.php");
    ?>

    <?php if($check > 0 ){ ?>
        
    <?php }else{ ?>
        <h1> Sembra che tu non abbia contratti, aggiungine uno ora! </h1>
        <a href="./addData/addContract.php"><button> Stipula un Contratto</button></a>
    <?php } ?>
</body>
</html>