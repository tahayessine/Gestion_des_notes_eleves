<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moyennes des élèves</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Moyennes des élèves</h1>
        <?php
        // Connexion à la base de données
        require_once('cnx.php');
        require_once('autorisation.php');

        // Récupération de l'ID du parent à partir du nom d'utilisateur
        {
            $idParent = $_SESSION['username'];
        }

        // Requête SQL pour récupérer les moyennes des notes des élèves du parent spécifié
        $sql = "SELECT e.nom AS nom_eleve, e.prenom AS prenom_eleve, AVG(n.note) AS moyenne
                FROM eleve AS e
                JOIN note AS n ON e.idEleve = n.idEleve
                JOIN parents AS pe ON e.idParent = pe.idParent
                WHERE pe.idParent = :idParent
                GROUP BY e.nom, e.prenom";

        // Préparation de la requête
        $query = $conn->prepare($sql);

        // Liaison des paramètres
        $query->bindParam(':idParent', $idParent, PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        // Récupération des résultats
        $resultats = $query->fetchAll(PDO::FETCH_ASSOC);

        // Affichage des résultats avec les mentions
        foreach ($resultats as $resultat) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $resultat['prenom_eleve'] . ' ' . $resultat['nom_eleve']; ?></h5>
                    <p class="card-text">Moyenne : <?php echo $resultat['moyenne']; ?></p>
                    <?php
                    // Détermination de la mention en fonction de la moyenne
                    $moyenne = $resultat['moyenne'];
                    $mention = '';
                    if ($moyenne >= 16) {
                        $mention = "Très bien";
                    } elseif ($moyenne >= 14) {
                        $mention = "Bien";
                    } elseif ($moyenne >= 12) {
                        $mention = "Assez bien";
                    } elseif ($moyenne >= 10) {
                        $mention = "Admis ";
                    } else {
                        $mention = "Redouble";
                    }
                    ?>
                    <p class="card-text">Mention : <?php echo $mention; ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>
