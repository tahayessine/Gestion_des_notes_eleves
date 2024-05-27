<?php
$id = $_GET['id'];
include('DAO.php');
$dao = new DAO();
if($dao->deleteModule($id)) header("location:../liste.php?type=module&res=success");
else header("location:../liste.php?type=module&res=error");
?>