<?php
    require_once ("cnx.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter élève</title>
</head>
<body>
    <?php
           // Fonction pour générer un mot de passe aléatoire
function genererMotDePasseAleatoire($longueur = 10) {
    // Définir les caractères pouvant être utilisés dans le mot de passe
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789()';
    
    // Obtenir la longueur des caractères disponibles
    $longueurCaracteres = strlen($caracteres);
    
    // Initialiser le mot de passe comme une chaîne vide
    $motDePasse = '';
    
    // Boucle pour générer chaque caractère du mot de passe
    for ($i = 0; $i < $longueur; $i++) {
        // Générer un index aléatoire pour choisir un caractère parmi les caractères disponibles
        $indexAleatoire = random_int(0, $longueurCaracteres - 1);
        
        // Ajouter le caractère choisi au mot de passe
        $motDePasse .= $caracteres[$indexAleatoire];
    }
    
    // Retourner le mot de passe généré
    return $motDePasse;
}
        $id=isset($_POST["idEleve"])?$_POST["idEleve"]:"";
        $nom=isset($_POST["nom"])?$_POST["nom"]:"";
        $prenom=isset($_POST["prenom"])?$_POST["prenom"]:"";
        $sex=isset($_POST["sexe"])?$_POST["sexe"]:"";
        $an_naissance=isset($_POST["dateNaissance"])?$_POST["dateNaissance"]:"";
        $id_ecole=isset($_POST["idEcole"])?$_POST["idEcole"]:"";
        $niveau=isset($_POST["niveau"])?$_POST["niveau"]:"";
        $groupe = isset($_POST["groupe"])?$_POST["groupe"]:"";
        $idParent=isset($_POST["idParent"])?$_POST["idParent"]:"";
      
            $motDePasse = genererMotDePasseAleatoire();
            $typ = 'Elève';
        

        try{
            $req="SELECT * FROM eleve where idEleve='$id'";
            $res=$conn->query($req);
            $data=$res->fetchAll(PDO::FETCH_ASSOC);
            if (count($data)!=0){
                echo "<p> l'élève avec l'id = $id existe déja...</p>";
                exit();
            }
          
          
        }
         catch(PDOException $e){
            echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()." </p>";
            exit();
        }
       
    
      
        try{     
            $req="INSERT INTO eleve  (idEleve,nom, prenom, dateNaissance, sexe, niveau, groupe, idParent)
                            VALUES('$id', '$nom', '$prenom', '$an_naissance', '$sex', '$niveau', '$groupe', '$idParent')";
            $nb=$conn->exec($req);
            if($nb!=0){
                echo "<p>ajout avec succés...</p>";
                echo "Mot de passe : " . $motDePasse;
            }
            else{
                echo "<p> echec d'ajout ...</p>";
            }

        } 
        catch (PDOException $e){
            echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
        }
        try{     
            $req1="INSERT INTO utilisateur (idUtilisateur, nom, prenom, motDePasse, typ)
                            VALUES('$id', '$nom', '$prenom','$motDePasse','$typ')";
            $nb=$conn->exec($req1);
                

        } catch (PDOException $e){
            echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
        }


       
        
    ?>
</body>
</html>