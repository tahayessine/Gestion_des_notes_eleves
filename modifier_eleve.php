<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un élève</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Modifier un élève</h2>

    <?php
    // Vérifier si l'ID de l'élève est passé en paramètre
    if (isset($_GET['id'])) {
        // Récupérer l'ID de l'élève depuis les paramètres de l'URL
        $idEleve = $_GET['id'];

        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les nouvelles données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateNaissance = $_POST['dateNaissance'];
            $sexe = $_POST['sexe'];
            $id_classe = $_POST['id_classe'];
            $idParent = $_POST['idParent'];

            // Requête SQL pour mettre à jour les données de l'élève
            $query = "UPDATE eleve SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, sexe = :sexe, id_classe = :id_classe, idParent = :idParent WHERE idEleve = :idEleve";
            $stmt = $conn->prepare($query);

            // Liaison des paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':dateNaissance', $dateNaissance);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':id_classe', $id_classe);
            $stmt->bindParam(':idParent', $idParent);
            $stmt->bindParam(':idEleve', $idEleve);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Les données de l'élève ont été modifiées avec succès.";
            } else {
                echo "Une erreur s'est produite lors de la modification des données de l'élève.";
            }
        }

        // Requête SQL pour récupérer les informations de l'élève
        $query = $conn->prepare("SELECT * FROM eleve WHERE idEleve = :idEleve");
        $query->bindParam(':idEleve', $idEleve);
        $query->execute();

        // Vérifier si l'élève existe dans la base de données
        if ($query->rowCount() > 0) {
            // Récupérer les données de l'élève
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
            <label for="dateNaissance">Date de Naissance :</label>
            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" value="<?php echo $row['dateNaissance']; ?>" required>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="Masculin" <?php if ($row['sexe'] == 'Masculin') echo 'selected'; ?>>Masculin</option>
                <option value="Féminin" <?php if ($row['sexe'] == 'Féminin') echo 'selected'; ?>>Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_classe">Classe :</label>
            <input type="text" class="form-control" id="id_classe" name="id_classe" value="<?php echo $row['id_classe']; ?>" required>
        </div>

        <div class="form-group">
            <label for="idParent">Parent :</label>
            <input type="text" class="form-control" id="idParent" name="idParent" value="<?php echo $row['idParent']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier l'élève</button>
    </form>

    <?php
        } else {
            echo "Aucun élève trouvé avec cet identifiant.";
        }
    } else {
        echo "L'identifiant de l'élève n'a pas été spécifié.";
    }
    ?>

</div>

</body>
</html>
