<?php
$code=$_POST['code'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$nomAr=$_POST['nomar'];
$prenomAr=$_POST['prenomar'];
$diplome=$_POST['diplome'];
$idGroupe=$_POST['idgroupe'];

include('DAO.php');
$dao=new DAO();
if($dao->AddEtud($code,$nom,$prenom,$nomAr,$prenomAr,$diplome,$idGroupe)) 
{
    header("location:../liste.php?type=etudiant&res=success");
}
else
{
    header("location:../liste.php?type=etudiant&res=error");
}
?>