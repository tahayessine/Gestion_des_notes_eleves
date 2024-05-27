<?php
require('DAO.php');
$dao=new DAO();
session_start();
if( !isset($_SESSION['nono']) && !$dao->User($nono) ){
	header("location:../login.php?erreur=1");
	die();
}
else{
    $nono=$_SESSION['nono'];
}
$email=$_POST['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$user = $dao->GetUser($nono);
foreach($user as $u)
{
    $psw = $u[4];
}
if($password==$psw){
    if(!empty($_POST["npassword"]))
    {   
        $npassword=$_POST['npassword'];
        if(!empty($_POST["cnpassword"]))
        {
            $cnpassword=$_POST['cnpassword'];
            if($npassword==$cnpassword)
            {
                if(!$dao->updateuserwp($email,$npassword,$fname,$lname,$nono))
                {
                    $_SESSION['nono']=$email;
                    header("location:../settings.php?res=1");
                }
                else header("location:../settings.php?res=2");
            }
            else{
                header("location:../settings.php?res=3");
            }
        }
        else  header("location:../settings.php?res=4");
    }
    else
    {   
        if(!$dao->updateusernp($email,$fname,$lname,$nono))
        {   
            $_SESSION['nono']=$email;
            header("location:../settings.php?res=5");
        }
        else header("location:../settings.php?res=6");
            
    }
}
else  header("location:../settings.php?res=7");
?>