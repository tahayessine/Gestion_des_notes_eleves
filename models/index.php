<?php
session_start();
include("../controllers/DAO.php");
$dao=new DAO();
if( !isset($_SESSION['nono']) || !$dao->User($_SESSION['nono']) ){
	header("location:../login.php?erreur=1");
	die();
}
else{
    $nono=$_SESSION['nono'];
    header("location:../liste.php?type=etudiant");
	die();
}


?>