<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moyennes des élèves avec mentions</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Moyennes des élèves avec mentions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom de l'élève</th>
                    <th>Prénom de l'élève</th>
                    <th>Moyenne</th>
                    <th>Mention</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                require_once('cnx.php');
                require_once('autorisation.php');

                // Requête SQL pour récupérer les moyennes des élèves avec leur mention
                $sql = "SELECT e.nom AS nom_eleve, e.prenom AS prenom_eleve, AVG(n.note) AS moyenne
                        FROM eleve AS e
                        LEFT JOIN note AS n ON e.idEleve = n.idEleve
                        GROUP BY e.idEleve";

                // Préparation de la requête
                $query = $conn->prepare($sql);

                // Exécution de la requête
                $query->execute();

                // Récupération des résultats
                $resultats = $query->fetchAll(PDO::FETCH_ASSOC);

                // Affichage des résultats avec les mentions
                foreach ($resultats as $resultat) {
                    echo "<tr>";
                    echo "<td>" . $resultat['nom_eleve'] . "</td>";
                    echo "<td>" . $resultat['prenom_eleve'] . "</td>";
                    echo "<td>" . round($resultat['moyenne'], 2) . "</td>";
                    // Détermination de la mention en fonction de la moyenne
                    $moyenne = $resultat['moyenne'];
                    $mention = '';
                    if ($moyenne >= 16) {
                        $mention = "Très bien";
                    } elseif ($moyenne >= 14) {
                        $mention = "Bien";
                    } elseif ($moyenne >= 12) {
                        $mention = "Assez bien";
                    } else {
                        $mention = "Redouble";
                    }
                    echo "<td>" . $mention . "</td>";
                    echo "</tr>";
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
