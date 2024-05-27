<?php
class DAO{
	public function __construct(){}
	public function connexion(){
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=gestionetud','root','');
		return $pdo;
	}
	public function authentificationUser($email,$password){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from users where username= ? and password = ?");
   		$reponse->execute([$email,$password]);
		if ($reponse->fetch()) return true;
   		else return false;
	}
	public function User($username){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from users where username= ?");
		$reponse->execute([$username]);
		if ($reponse->fetch()) return true;
   		else return false;
	}
	public function GetUser($username){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from users where username= ?");
		$reponse->execute([$username]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function updateuserwp($email,$npassword,$fname,$lname,$nono){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE users set username=?,password=?,prenom=?,nom=? where username=?");
		$reponse->execute([$email,$npassword,$fname,$lname,$nono]);
		if ($reponse->fetch()) return true;
   		else return false;
	}
	public function updateusernp($email,$fname,$lname,$nono){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE users set username=?,prenom=?,nom=? where username=?");
		$reponse->execute([$email,$fname,$lname,$nono]);
		if ($reponse->fetch()) return true;
   		else return false;
	}
	public function ListEtud(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from etudiant order by id_etudiant");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function ListEtudByid($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from etudiant where id_etudiant=?");
		$reponse->execute([$id]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function AddEtud($code,$n,$p,$nar,$par,$dip,$idg){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into etudiant(CODE_ETUDIANT,NOM,PRENOM,NOM_AR,PRENOM_AR,DIPLOME,ID_GROUPE) values (?,?,?,?,?,?,?)");
		$reponse->execute([$code,$n,$p,$nar,$par,$dip,$idg]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function deleteEtud($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from etudiant where id_etudiant=?");
		$reponse->execute([$id]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function UpdateEtud($code,$n,$p,$nar,$par,$dip,$idg,$idetud){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE etudiant set code_etudiant=?,nom=?,prenom=?,nom_ar=?,prenom_ar=?,diplome=?,id_groupe=? where id_etudiant=?");
		$reponse->execute([$code,$n,$p,$nar,$par,$dip,$idg,$idetud]);
		if ($reponse->fetch()) return true;
		else return false;
	}

	public function ListSemestre(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from semestre order by id_semestre");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}

	public function ListProf(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from professeur order by id_prof");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function ListProfById($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT * from professeur where id_prof = ?");
		$reponse->execute([$id]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function AddProf($n,$p,$code,$type){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into professeur(NOM,PRENOM,CODEPPR,TYPE) values (?,?,?,?)");
		$reponse->execute([$n,$p,$code,$type]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function deleteProf($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from professeur where id_prof=?");
		$reponse->execute([$id]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function UpdateProf($n,$p,$code,$type,$id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE professeur set NOM=?,PRENOM=?,CODEPPR=?,TYPE=? where id_prof=?");
		$reponse->execute([$n,$p,$code,$type,$id]);
		if ($reponse->fetch()) return true;
		else return false;
	}
 	public function ListModule(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT id_module,code_module,module.nom,module.coefficient,semestre.libelle,professeur.nom,professeur.prenom 
								from module,semestre,professeur where module.id_semestre=semestre.id_semestre and module.id_prof = professeur.id_prof order by id_module");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function ListModuleById($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT id_module,code_module,module.nom,module.coefficient,semestre.id_semestre,semestre.libelle,professeur.id_prof,professeur.nom,professeur.prenom 
								from module,semestre,professeur where module.id_semestre=semestre.id_semestre and module.id_prof = professeur.id_prof and id_module =?");
		$reponse->execute([$id]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function AddModule($code,$nom,$coef,$semes,$prof){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into module(CODE_MODULE,NOM,COEFFICIENT,ID_SEMESTRE,ID_PROF) values (?,?,?,?,?)");
		$reponse->execute([$code,$nom,$coef,$semes,$prof]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function deleteModule($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("DELETE from module where id_module=?");
		$reponse->execute([$id]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function UpdateModule($code,$nom,$coef,$semes,$prof,$id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE module set CODE_MODULE=?,NOM=?,COEFFICIENT=?,ID_SEMESTRE=?,ID_PROF=? where id_module=?");
		$reponse->execute([$code,$nom,$coef,$semes,$prof,$id]);
		if ($reponse->fetch()) return true;
		else return false;
	}

	public function ListExam(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT id_examen,id_groupe,module.nom,date_examen from examen,module
								where examen.id_module=module.id_module order by id_examen");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}

	public function ListNote($id){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT etudiant.id_etudiant,etudiant.nom,etudiant.prenom,module.nom,moyenne 
		from etudiant,module,examen,note where etudiant.id_etudiant=note.id_etudiant
		and module.id_module=examen.id_module and note.id_examen=examen.id_examen and examen.id_examen=?");
		$reponse->execute([$id]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function UpdateNote($note,$id_etud,$id_exam){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("UPDATE note set moyenne=? where id_etudiant=? and id_examen=?");
		$reponse->execute([$note,$id_etud,$id_exam]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function AddExamen($prof,$groupe,$module,$date){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into examen(id_prof,id_groupe,id_module,date_examen) values(?,?,?,?)");
		$reponse->execute([$prof,$groupe,$module,$date]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function AddNote($groupe,$examen){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("INSERT into note(id_etudiant,id_examen) select etudiant.id_etudiant,examen.id_examen 
								from etudiant,examen where etudiant.id_groupe=? and examen.id_examen=?");
		$reponse->execute([$groupe,$examen]);
		if ($reponse->fetch()) return true;
		else return false;
	}
	public function GestLastIDExam(){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT max(id_examen) from examen");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function delibmodule($module){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT note.id_etudiant,etudiant.nom,etudiant.prenom,examen.id_examen,module.id_module,module.nom ,note.moyenne 
								from note,etudiant,module,examen
								where note.id_etudiant=etudiant.id_etudiant and module.id_module=examen.id_module 
								and note.id_examen=examen.id_examen and module.id_module=?");
		$reponse->execute([$module]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function GetIdEtudiantBySem($semestre){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT distinct note.id_etudiant 
								from note,etudiant,module,examen,semestre 
								where note.id_etudiant=etudiant.id_etudiant and semestre.id_semestre=module.id_semestre 
								and module.id_module=examen.id_module and note.id_examen=examen.id_examen and semestre.id_semestre=?");
		$reponse->execute([$semestre]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function GetEtud($semestre,$etud){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT note.id_etudiant,etudiant.nom,etudiant.prenom,semestre.libelle, note.moyenne*module.coefficient
								from note,etudiant,module,examen,semestre 
								where note.id_etudiant=etudiant.id_etudiant and semestre.id_semestre=module.id_semestre 
								and module.id_module=examen.id_module 
								and note.id_examen=examen.id_examen and semestre.id_semestre=? and note.id_etudiant=?");
		$reponse->execute([$semestre,$etud]);
		$lst=[];
		$somme=0;
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$somme=$somme+$ligne[4]];
	   	}
		$res=[];
		foreach($lst as $l)
		{
			$id=$l[0];$nom=$l[1];$prenom=$l[2];$sem=$l[3];
		}
		$res[] =[$id,$prenom,$nom,$sem,$somme];
		$reponse->closeCursor();  
		return $res;
	}
	public function GetIdEtudiantByAnne($semestre){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT distinct note.id_etudiant 
								from note,etudiant,module,examen,semestre 
								where note.id_etudiant=etudiant.id_etudiant and semestre.id_semestre=module.id_semestre 
								and module.id_module=examen.id_module and note.id_examen=examen.id_examen and semestre.libelle like '%$semestre%'");
		$reponse->execute([]);
		$lst=[];
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0]];
	   }
		$reponse->closeCursor();  
		return $lst;
	}
	public function GetEtudByAnne($semestre,$etud){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("SELECT note.id_etudiant,etudiant.nom,etudiant.prenom,semestre.libelle, note.moyenne*module.coefficient 
								from note,etudiant,module,examen,semestre where note.id_etudiant=etudiant.id_etudiant 
								and semestre.id_semestre=module.id_semestre and module.id_module=examen.id_module 
								and note.id_examen=examen.id_examen and semestre.libelle like '%$semestre%' and note.id_etudiant=?");
		$reponse->execute([$etud]);
		$lst=[];
		$somme=0;
		while($ligne=$reponse->fetch()){
			 $lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$somme=$somme+$ligne[4]];
	   	}
		$res=[];
		foreach($lst as $l)
		{
			$id=$l[0];$nom=$l[1];$prenom=$l[2];$sem=$l[3];
		}
		$res[] =[$id,$prenom,$nom,$sem,$somme/2];
		$reponse->closeCursor();  
		return $res;
	}
}
?>