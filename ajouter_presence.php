<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des présences par classe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Gestion des présences par classe</h2>

    <form id="formClasse">
        <div class="form-group">
            <label for="idClasse">Classe :</label>
            <?php
            // Connexion à la base de données
            $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

            // Requête SQL pour récupérer les classes
            $query = $conn->query("SELECT id_classe, nom_classe FROM classe");

            // Vérification si des classes ont été trouvées
            if ($query->rowCount() > 0) {
                // Afficher les options pour chaque classe
                echo "<select class='form-control' id='idClasse' name='idClasse' required>";
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$row['id_classe']."'>".$row['nom_classe']."</option>";
                }
                echo "</select>";
            } else {
                echo "Aucune classe trouvée dans la base de données.";
            }

            // Fermer la connexion
            $conn = null;
            ?>
        </div>

        <div class="form-group">
            <label for="datePresence">Date de présence :</label>
            <input type="date" class="form-control" id="datePresence" name="datePresence" required>
        </div>

        <button type="button" id="btnAfficherEleves" class="btn btn-primary">Afficher les élèves</button>
    </form>

    <!-- Conteneur pour afficher la liste des élèves -->
    <div id="listeEleves"></div>

</div>

<script>
$(document).ready(function(){
    $("#btnAfficherEleves").click(function(){
        var idClasse = $("#idClasse").val();
        var datePresence = $("#datePresence").val();
        $.ajax({
            url: "get_eleves.php",
            type: "POST",
            data: { idClasse: idClasse, datePresence: datePresence },
            success: function(response) {
                $("#listeEleves").html(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    // Soumettre le formulaire pour enregistrer les présences
    $("#listeEleves").on("submit", "#formPresence", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "enregistrer_presence.php",
            type: "POST",
            data: formData,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

</body>
</html>
