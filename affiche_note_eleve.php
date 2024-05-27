<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des élèves</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez votre propre style CSS ici */
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Résultats des élèves</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom de l'élève</th>
                        <th>Nom de la matière</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>




                    <?php
    
                   require_once('cnx.php');
                   require_once('autorisation.php');

                   // Démarrage de la session
                   
                   
                   // Vérification de l'existence de la session et récupération de l'ID du paren
                       $idEleve = $_SESSION['username'];

                   // Requête SQL pour récupérer les informations sur les élèves, les matières et les notes
$sql = "SELECT e.nom AS nom_eleve, e.prenom AS prenom_eleve, m.nom_matiere AS nom_matiere, n.note
FROM eleve AS e
JOIN note AS n ON e.idEleve = n.idEleve
JOIN matiere AS m ON n.id_matiere = m.id_matiere
WHERE e.idEleve = :idEleve
ORDER BY e.nom, e.prenom, m.nom_matiere";

// Préparation et exécution de la requête
$query = $conn->prepare($sql);

// Liaison des paramètres
$query->bindParam(':idEleve', $idEleve, PDO::PARAM_INT);

// Exécution de la requête
$query->execute();

// Récupération des résultats
$resultats = $query->fetchAll(PDO::FETCH_ASSOC);
$nomPrenomPrecedent = "";
foreach ($resultats as $resultat) {
    echo "<tr>";
    // Vérifie si le nom et le prénom de l'élève sont différents des précédents
    if ($resultat['nom_eleve'] . $resultat['prenom_eleve'] !== $nomPrenomPrecedent) {
        echo "<td>" . $resultat['nom_eleve'] . " " . $resultat['prenom_eleve'] . "</td>";
        $nomPrenomPrecedent = $resultat['nom_eleve'] . $resultat['prenom_eleve'];
    } else {
        echo "<td></td>"; // Si c'est le même nom et prénom, afficher une cellule vide
    }
    // Vérifie si le nom et le prénom de l'élève sont différents des précédents
    echo "<td>" . $resultat['nom_matiere'] . "</td>";
    echo "<td>" . $resultat['note'] . "</td>";
    echo "</tr>";
}
?>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
