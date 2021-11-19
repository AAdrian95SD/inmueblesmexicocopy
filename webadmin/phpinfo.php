<?php 
    if (!isset($_SESSION)) { session_start();}
    $_SESSION['login_id']=null;
    $_SESSION['login'] = null;
    
    if($_SESSION['login'] == null){
        unset($_SESSION); 
        header("location: ../index.php");
    } 
?>