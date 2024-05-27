<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <!-- Bouton "Ajouter élève" -->
    <a href="Form_ajouter_eleve.php" class="btn btn-primary mb-3">Ajouter élève</a>

    <h2>Liste des élèves</h2>

    <?php
    // Connexion à la base de données
    require_once('cnx.php');

    // Requête SQL pour récupérer les élèves
    $query = $conn->query("SELECT * FROM eleve");

    // Vérifier si des élèves ont été trouvés
    if ($query->rowCount() > 0) {
        echo "<table class='table'>";
        echo "<thead class='thead-dark'><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date de Naissance</th><th>Sexe</th><th>ID Classe</th><th>ID Parent</th><th>Actions</th></tr></thead><tbody>";

        // Afficher les données des élèves
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['idEleve']."</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['dateNaissance']."</td>";
            echo "<td>".$row['sexe']."</td>";
            echo "<td>".$row['id_classe']."</td>";
            echo "<td>".$row['idParent']."</td>";
            echo "<td><a href='modifier_eleve.php?id=".$row['idEleve']."' class='btn btn-primary btn-sm'>Modifier</a> <a href='supprimer_eleve.php?id=".$row['idEleve']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Voulez-vous vraiment supprimer cet élève ?\")'>Supprimer</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Aucun élève trouvé dans la base de données.";
    }

    // Fermer la connexion
    $conn = null;
    ?>

</div>

</body>
</html>
