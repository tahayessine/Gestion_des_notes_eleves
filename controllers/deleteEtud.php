<?php
$id = $_GET['id'];
include('DAO.php');
$dao = new DAO();
if($dao->deleteEtud($id)) header("location:../liste.php?type=etudiant&res=success");
else header("location:../liste.php?type=etudiant&res=error");
?>