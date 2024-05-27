<?php
$code=$_POST['code'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$type=$_POST['type'];
$id=$_POST['id'];

include('DAO.php');
$dao=new DAO();
if($dao->UpdateProf($nom,$prenom,$code,$type,$id)) 
{
    header("location:../liste.php?type=professeur&res=success");
}
else
{
    header("location:../liste.php?type=professeur&res=error");
}
?>