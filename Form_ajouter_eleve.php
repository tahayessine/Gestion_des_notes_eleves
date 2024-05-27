<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élève</title>
    <!-- Ajout du lien Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-5">Ajouter un élève</h2>

    <form method="post" action="ajouter_eleve.php">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="dateNaissance">Date de Naissance :</label>
            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="Masculin">Masculin</option>
                <option value="Féminin">Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_classe">Classe :</label>
            <select class="form-control" id="id_classe" name="id_classe" required>
                <?php
                // Connexion à la base de données
                $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

                // Récupération des classes depuis la base de données
                $query = $conn->query("SELECT * FROM classe");

                // Affichage des options du menu déroulant
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$row['id_classe']."'>".$row['niveau']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="idParent">Parent :</label>
            <select class="form-control" id="idParent" name="idParent" required>
                <?php
                // Récupération des parents depuis la base de données
                $query_parents = $conn->query("SELECT * FROM parents");

                // Affichage des options du menu déroulant
                while ($row_parent = $query_parents->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$row_parent['idParent']."'>".$row_parent['']." ".$row_parent['nom']."</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'élève</button>
    </form>
</div>

<!-- Ajout du script Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>