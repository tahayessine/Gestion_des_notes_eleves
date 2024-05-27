<?php
// Inclusion du fichier de connexion à la base de données
require_once "cnx.php";

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

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $idParent = $_POST["idParent"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];


    
    // Génération d'un mot de passe aléatoire
    $motDePasse = genererMotDePasseAleatoire();
    $typ='Parent';
}



    try{     
        $req="INSERT INTO parents (idParent,nom,prenom,email,motDePasse)
                        VALUES('$idParent','$nom','$prenom','$email','$motDePasse')";
        $nb=$conn->exec($req);
        if($nb!=0){
            // Affichage du message de succès avec une classe Bootstrap pour le style
            echo "<div class='alert alert-success' role='alert'>
                    <strong>Succès !</strong> Le compte (ID: $idParent) $prenom $nom a été ajouté avec succès.
                  </div>";
            
            // Affichage du mot de passe généré avec une classe Bootstrap pour le style
            echo "<div class='alert alert-info' role='alert'>
                    <strong>Info :</strong> Votre mot de passe est : $motDePasse
                  </div>";
        } else {
            // Affichage du message d'erreur avec une classe Bootstrap pour le style
            echo "<div class='alert alert-danger' role='alert'>
                    <strong>Erreur !</strong> Une erreur est survenue lors de la création du compte parent.
                  </div>";
        }
    }

     catch (PDOException $e){
        echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
    }

try{     
    $req1="INSERT INTO utilisateur (idUtilisateur, nom, prenom, motDePasse, typ)
                    VALUES('$idParent', '$nom', '$prenom','$motDePasse','$typ')";
    $nb=$conn->exec($req1);
        

} catch (PDOException $e){
    echo "<p>ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine()."</p>";
}

    
    exit();
?>
