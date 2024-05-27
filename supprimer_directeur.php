<?php
// Vérifier si l'ID du directeur à supprimer est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID du directeur depuis les paramètres de l'URL
    $idDirecteur = $_GET['id'];

    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

    // Requête SQL pour supprimer le directeur
    $query = "DELETE FROM directeur WHERE idDirecteur = :idDirecteur";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idDirecteur', $idDirecteur);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Afficher un message si la suppression réussit
        echo "Le directeur a été supprimé avec succès.";
    }

    // Redirection vers la page précédente après la suppression
    header("Location: liste_directeur.php");
    exit();
} else {
    // Si l'ID du directeur à supprimer n'est pas spécifié, afficher un message d'erreur
    echo "L'identifiant du directeur à supprimer n'a pas été spécifié.";
}
?>
