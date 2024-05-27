<?php
    if(!session_id())
        session_start();
    $jeton=isset($_SESSION["jeton"])?$_SESSION["jeton"]:"";
    $username=isset($_SESSION["username"])?$_SESSION["username"]:"";
    
    if ($jeton!="pass")
    {
        header("location:index.php");
    }
?>