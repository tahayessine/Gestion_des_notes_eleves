<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves avec leurs notes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Liste des élèves avec leurs notes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de l'élève</th>
                    <th>Nom de l'élève</th>
                    <th>Prénom de l'élève</th>
                    <th>Nom de la matière</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                require_once('cnx.php');
                require_once('autorisation.php');

                // Requête SQL pour récupérer tous les élèves avec leurs notes
                $sql = "SELECT e.idEleve, e.nom AS nom_eleve, e.prenom AS prenom_eleve, m.nom_matiere AS nom_matiere, n.note
                        FROM eleve AS e
                        LEFT JOIN note AS n ON e.idEleve = n.idEleve
                        LEFT JOIN matiere AS m ON n.id_matiere = m.id_matiere
                        ORDER BY e.nom, e.prenom";

                // Préparation de la requête
                $query = $conn->prepare($sql);

                // Exécution de la requête
                $query->execute();

                // Récupération des résultats
                $resultats = $query->fetchAll(PDO::FETCH_ASSOC);

                // Initialisation des variables pour vérifier les doublons
                $previous_nom = null;
                $previous_prenom = null;

                // Affichage des résultats
                foreach ($resultats as $resultat) {
                    echo "<tr>";
                    if ($resultat['nom_eleve'] !== $previous_nom || $resultat['prenom_eleve'] !== $previous_prenom) {
                        // Afficher l'ID de l'élève, son nom, son prénom et son niveau uniquement si le nom ou le prénom de l'élève change
                        echo "<td>" . $resultat['idEleve'] . "</td>";
                        echo "<td>" . $resultat['nom_eleve'] . "</td>";
                        echo "<td>" . $resultat['prenom_eleve'] . "</td>";
                      
                    } else {
                        // Si le nom et le prénom sont les mêmes que la ligne précédente, laisser ces cellules vides
                        echo "<td></td><td></td><td></td>";
                    }
                    echo "<td>" . ($resultat['nom_matiere'] !== null ? $resultat['nom_matiere'] : "Aucune note enregistrée") . "</td>";
                    echo "<td>" . ($resultat['note'] !== null ? $resultat['note'] : "-") . "</td>";
                    echo "</tr>";
                    // Mettre à jour les valeurs précédentes pour la prochaine itération
                    $previous_nom = $resultat['nom_eleve'];
                    $previous_prenom = $resultat['prenom_eleve'];
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (facultatif si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>