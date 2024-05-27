<?php
   
    $servername="localhost";
    $databasename="school";
    $username="root";
    $password="";
    try{
        $conn=new PDO("mysql:host=$servername;dbname=$databasename;",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<p>ERREUR : ".$e->getMessage(). " LINE : ".$e->getLine()."</p>";
    }
?>