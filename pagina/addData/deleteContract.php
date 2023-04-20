<?php
    require("../../config.php");
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../login.php");
    }

    $sql = "DELETE FROM contratti WHERE IDRigaContratto = ?";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("i", $_SESSION['con']);
    $stmt->execute();
    header("Location: ../index.php");
?>