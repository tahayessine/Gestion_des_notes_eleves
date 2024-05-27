<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un directeur</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Modifier un directeur</h2>

    <?php
    // Vérifier si l'ID du directeur est passé en paramètre
    if (isset($_GET['id'])) {
        // Récupérer l'ID du directeur depuis les paramètres de l'URL
        $idDirecteur = $_GET['id'];

        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les nouvelles données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $idEcole = $_POST['idEcole'];

            // Requête SQL pour mettre à jour les données du directeur
            $query = "UPDATE directeur SET nom = :nom, prenom = :prenom, email = :email, idEcole = :idEcole WHERE idDirecteur = :idDirecteur";
            $stmt = $conn->prepare($query);

            // Liaison des paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':idEcole', $idEcole);
            $stmt->bindParam(':idDirecteur', $idDirecteur);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Les données du directeur ont été modifiées avec succès.";
                // Redirection vers la page liste_directeur.php après la modification réussie
                header("Location: liste_directeur.php");
                exit(); // Assure que le script s'arrête ici pour éviter toute exécution supplémentaire
            } else {
                echo "Une erreur s'est produite lors de la modification des données du directeur.";
            }
            
        }

        // Requête SQL pour récupérer les informations du directeur
        $query = $conn->prepare("SELECT * FROM directeur WHERE idDirecteur = :idDirecteur");
        $query->bindParam(':idDirecteur', $idDirecteur);
        $query->execute();

        // Vérifier si le directeur existe dans la base de données
        if ($query->rowCount() > 0) {
            // Récupérer les données du directeur
            $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="idEcole">ID École :</label>
            <input type="text" class="form-control" id="idEcole" name="idEcole" value="<?php echo $row['idEcole']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier le directeur</button>
    </form>

    <?php
        } else {
            echo "Aucun directeur trouvé avec cet identifiant.";
        }
    } else {
        echo "L'identifiant du directeur n'a pas été spécifié.";
    }
    ?>

</div>

</body>
</html>
