<?php
// Vérification si des données POST ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idClasse']) && isset($_POST['datePresence'])) {
    // Récupération des données POST
    $idClasse = $_POST['idClasse'];
    $datePresence = $_POST['datePresence'];

    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

    // Requête SQL pour récupérer les élèves de la classe sélectionnée
    $query = $conn->prepare("SELECT idEleve, nom, prenom FROM eleve WHERE id_classe = ?");
    $query->execute([$idClasse]);

    // Vérification si des élèves ont été trouvés
    if ($query->rowCount() > 0) {
        // Affichage de la liste des élèves avec des boutons radio pour l'état de présence
        echo "<form id='formPresence' action='absence.php' method='post'>";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='form-group'>";
            echo "<input type='hidden' name='idEleve[]' value='".$row['idEleve']."'>";
            echo "<label for='etatPresence_".$row['idEleve']."'>".$row['nom']." ".$row['prenom']."</label>";
            echo "<input type='radio' id='etatPresence_".$row['idEleve']."' name='etatPresence[".$row['idEleve']."]' value='P' > Présent";
            echo "<input type='radio' id='etatPresence_".$row['idEleve']."' name='etatPresence[".$row['idEleve']."]' value='A' checked > Absent";
            echo "</div>";
        }
        echo "<input type='hidden' name='datePresence' value='".$datePresence."'>";
        echo "<button type='submit' class='btn btn-primary'>Enregistrer la présence</button>";
        echo "</form>";
    } else {
        echo "Aucun élève trouvé dans cette classe.";
    }

    // Fermer la connexion à la base de données
    $conn = null;
} else {
    echo "Erreur : Les données POST ne sont pas définies.";
}
?>
