<?php
// Inclusion du fichier de connexion à la base de données
require_once("cnx.php");
require_once('autorisation.php');
        // Fonction pour générer un mot de passe aléatoire
        function genererMotDePasseAleatoire($longueur = 10)
         {

            // Définir les caractères pouvant être utilisés dans le mot de passe
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            
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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['dateNaissance'];
    $sexe = $_POST['sexe'];
    $id_classe = $_POST['id_classe'];
    $idParent = isset($_POST['idParent']) ? $_POST['idParent'] : null; // Vérifie si idParent est défini

    try {
        

        // Requête SQL pour insérer l'élève dans la base de données
        $query = "INSERT INTO eleve (nom, prenom, dateNaissance, sexe, id_classe, idParent) VALUES (:nom, :prenom, :dateNaissance, :sexe, :id_classe, :idParent)";
        $stmt = $conn->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':dateNaissance', $dateNaissance);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':id_classe', $id_classe);
        $stmt->bindParam(':idParent', $idParent, PDO::PARAM_INT);
        $motDePasse = genererMotDePasseAleatoire();
        $typ = 'Elève';
    

        // Exécution de la requête
        if ($stmt->execute()) {
            $last_id = $conn->lastInsertId(); // Récupérer l'ID de l'élève nouvellement inséré
            echo "L'élève (ID: $last_id) $prenom $nom a été ajouté avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout de l'élève.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
    try{     
        $req="INSERT INTO utilisateur (idUtilisateur, nom, prenom, motDePasse, typ)
                        VALUES('$last_id', '$nom', '$prenom','$motDePasse','$typ')";
        $nb=$conn->exec($req);
        echo " Votre Mot de passe : " . $motDePasse;
            

    } catch (PDOException $e){
        echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
    }
}
?>
