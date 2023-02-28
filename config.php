<?php 
    $server = "localhost";
    $username = "root";
    $passwd = "";
    $db = "terranova";

    $connessione = new mysqli($server , $username , $passwd , $db);

    if($connessione->connect_error){
        die("Error during database conncetion: " . $connessione->connect_error);
    }

?>