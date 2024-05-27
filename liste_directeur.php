<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des directeurs</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<h2>Liste des directeurs</h2>
    <!-- Bouton "Ajouter directeur" -->
    <a href="Form_ajouter_directeur.php" class="btn btn-primary mb-3">Ajouter directeur</a>

   

    <?php
    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

    // Requête SQL pour récupérer les directeurs
    $query = $conn->query("SELECT * FROM directeur");

    // Vérifier si des directeurs ont été trouvés
    if ($query->rowCount() > 0) {
        echo "<table class='table'>";
        echo "<thead class='thead-dark'><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>ID Ecole</th><th>Actions</th></tr></thead><tbody>";

        // Afficher les données des directeurs
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['idDirecteur']."</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['idEcole']."</td>";
            echo "<td><a href='modifier_directeur.php?id=".$row['idDirecteur']."' class='btn btn-primary btn-sm'>Modifier</a> <a href='supprimer_directeur.php?id=".$row['idDirecteur']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Voulez-vous vraiment supprimer ce directeur ?\")'>Supprimer</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Aucun directeur trouvé dans la base de données.";
    }

    // Fermer la connexion
    $conn = null;
    ?>

</div>

</body>
</html>
