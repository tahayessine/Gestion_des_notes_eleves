<?php
$module=$_POST['module'];
$prof=$_POST['prof'];
$groupe=$_POST['groupe'];
$date=$_POST['date'];

include('DAO.php');
$dao=new DAO();

if(!$dao->AddExamen($prof,$groupe,$module,$date)) 
{
    $id = $dao->GestLastIDExam();
    foreach($id as $i)
    {
        $examid=$i[0];
    }

    $dao->AddNote($groupe,$examid);
    header("location:../listenote.php?res=success");
}
else
{
    header("location:../listenote.php?res=error");
}
?>