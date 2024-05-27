<?php
$id = $_GET['id'];
include('DAO.php');
$dao = new DAO();
if($dao->deleteProf($id)) header("location:../liste.php?type=professeur&res=success");
else header("location:../liste.php?type=professeur&res=error");
?>