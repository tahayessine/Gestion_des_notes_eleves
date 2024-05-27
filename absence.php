<?php
// Connexion à la base de données
require_once('cnx.php');
require_once('autorisation.php');

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si le formulaire a été soumis
    if (isset($_POST['presence']) && is_array($_POST['presence'])) {
        // Préparation de la requête d'insertion
        $sql_insert = "INSERT INTO presence (idEleve, datePresence, etat) VALUES (:idEleve, CURDATE(), :etat)";
        $query_insert = $conn->prepare($sql_insert);

        // Insertion des données pour chaque élève
        foreach ($_POST['presence'] as $idEleve => $etat) {
            $query_insert->bindParam(':idEleve', $idEleve, PDO::PARAM_INT);
            $query_insert->bindParam(':etat', $etat, PDO::PARAM_STR);
            $query_insert->execute();
        }

        echo "La présence a été enregistrée avec succès.";
    } else {
        echo "Aucune donnée de présence n'a été reçue.";
    }
}
?>