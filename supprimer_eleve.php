<?php
// Vérifier si l'ID de l'élève à supprimer est passé en paramètre
if (isset($_GET['id'])) {
    // Récupérer l'ID de l'élève depuis les paramètres de l'URL
    $idEleve = $_GET['id'];

    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour supprimer l'élève
    $query = "DELETE FROM eleve WHERE idEleve = :idEleve";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idEleve', $idEleve);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Afficher un message si la suppression réussit
        echo "L'élève a été supprimé avec succès.";
    }

    // Redirection vers la page précédente après la suppression
    header("Location: liste_eleve.php");
    exit();
} else {
    // Si l'ID de l'élève à supprimer n'est pas spécifié, afficher un message d'erreur
    echo "L'identifiant de l'élève à supprimer n'a pas été spécifié.";
}
?>
