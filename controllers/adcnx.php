<?php
	if(!isset($_POST["submit"])){
		header("location:../login.php?erreur=1");
		die();
	}
	$email=$_POST['email'];
	$password=$_POST['password'];
	include('DAO.php');
	$dao=new DAO();
	if($dao->authentificationUser($email,$password)){
		session_start();
        $_SESSION['nono']=$email; 
		header("location:../liste.php?type=etudiant");
	}else{
		header("location:../login.php?erreur=2");
		die();
	}

?>