<?php
// Connexion à la base de données
require_once('cnx.php');
require('autorisation.php');

// Récupération de l'ID du parent à partir de la session ou de toute autre source appropriée
$idParent = $_SESSION['username']; // Assurez-vous de définir correctement cette variable

// Requête SQL pour récupérer le nom de l'élève et la date d'absence
$sql = "SELECT e.nom AS nom_eleve, e.prenom AS prenom_eleve, p.datePresence , COUNT(p.datePresence) AS total_absences
        FROM eleve AS e
        JOIN presence AS p ON e.idEleve = p.idEleve
        WHERE e.idParent = :idParent AND p.etat = 'A'"; // Seuls les enregistrements où l'état est 'A' (absent) sont sélectionnés

// Préparation de la requête
$query = $conn->prepare($sql);

// Liaison des paramètres
$query->bindParam(':idParent', $idParent, PDO::PARAM_INT);

// Exécution de la requête
$query->execute();

// Récupération des résultats
$resultats = $query->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats

foreach ($resultats as $resultat) {
    echo "Nom de l'élève : " . $resultat['nom_eleve'] . " " . $resultat['prenom_eleve'] . "<br>";
    echo "Date d'absence : " . $resultat['datePresence'] . "<br><br>";
    echo "Total des jours d'absence : " . $resultat['total_absences'] . "<br><br>";
}



?>
