<?php
// Vérification si des données POST ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idEleve']) && isset($_POST['datePresence']) && isset($_POST['etatPresence'])) {
    // Récupération des données POST
    $idEleves = $_POST['idEleve'];
    $datePresence = $_POST['datePresence'];
    $etat = $_POST['etat'];

    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

    // Préparation de la requête SQL pour insérer les présences
    $query = $conn->prepare("INSERT INTO presence (idEleve, datePresence, etat) VALUES (?, ?, ?)");

    // Boucle pour insérer chaque présence avec l'état correspondant
    foreach ($idEleves as $key => $idEleve) {
        // État de présence ('P' pour présent, 'A' pour absent)
        $etat = ($etat[$key] == 'present') ? 'P' : 'A';
        $query->execute([$idEleve, $datePresence, $etat]);
    }

    // Fermer la connexion à la base de données
    $conn = null;

    // Afficher un message de succès
    echo "Les présences ont été enregistrées avec succès.";
} else {
    echo "Erreur : Les données POST ne sont pas définies.";
}
?>
