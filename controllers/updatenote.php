<?php
include('DAO.php');
$dao=new DAO();
$id_exam=$_POST['id'];
$ids = $dao->ListEtud($id);
foreach($ids as $id)
{
    $i=$id[0];
    $dao->updatenote($_POST["note-$i"],$i,$id_exam);
}
header("location:../listenote.php?uid=$id_exam&res=success");