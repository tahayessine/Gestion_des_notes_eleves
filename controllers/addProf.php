<?php
$code=$_POST['code'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$type=$_POST['type'];

include('DAO.php');
$dao=new DAO();
if($dao->AddProf($nom,$prenom,$code,$type)) 
{
    header("location:../liste.php?type=professeur&res=success");
}
else
{
    header("location:../liste.php?type=professeur&res=error");
}
?>