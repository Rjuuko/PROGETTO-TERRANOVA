
<?php 
    
    session_start();
    unset($_SESSION['email']) ;
    unset($_SESSION['userID']);
    session_destroy(); 
    header("Location: ../login.php");
?>