<?php
require_once("cnx.php");
require_once("autorisation.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $idEcole = $_POST['idEcole'];

    // Fonction pour générer un mot de passe aléatoire
    function genererMotDePasse($longueur = 8) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $motDePasse = '';
        for ($i = 0; $i < $longueur; $i++) {
            $motDePasse .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $motDePasse;
    }
}

    // Génération du mot de passe
    $motDePasse = genererMotDePasse();

    try {
        // Requête SQL pour insérer le directeur dans la table utilisateur
        $sql = "INSERT INTO directeur (nom, prenom, email, motDePasse, idEcole) VALUES (:nom, :prenom, :email, :motDePasse, :idEcole)";
        // Préparation de la requête
        $query = $conn->prepare($sql);
        // Liaison des paramètres
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $query->bindParam(':motDePasse', $motDePasse);
        $query->bindParam(':idEcole', $idEcole);
        // Exécution de la requête
        $query->execute();

     
    } catch (PDOException $e) {
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }
    $typ = 'Directeur';
    

        // Exécution de la requête
            $last_id = $conn->lastInsertId(); // Récupérer l'ID de l'élève nouvellement inséré
            echo "Le directeur (ID: $last_id) $prenom $nom a été ajouté avec succès.";
    
    
    try{     
        $req="INSERT INTO utilisateur (idUtilisateur, nom, prenom, motDePasse, typ)
                        VALUES('$last_id', '$nom', '$prenom','$motDePasse','$typ')";
        $nb=$conn->exec($req);
        echo " Votre Mot de passe : " . $motDePasse;
            

    }
     catch (PDOException $e){
        
    echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
    }


    
?>
