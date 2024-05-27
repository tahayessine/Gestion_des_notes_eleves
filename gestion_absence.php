<?php
// Connexion à la base de données
require_once('cnx.php');

// Récupération de tous les élèves
$sql_eleves = "SELECT idEleve, nom, prenom FROM eleve";
$query_eleves = $conn->query($sql_eleves);
$eleves = $query_eleves->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement de la présence</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Enregistrement de la présence des élèves</h2>
        <form method="post" action='absence.php'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Présent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eleves as $eleve) : ?>
                        <tr>
                            <td><?= $eleve['nom'] ?></td>
                            <td><?= $eleve['prenom'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="presence[<?= $eleve['idEleve'] ?>]" id="present<?= $eleve['idEleve'] ?>" value="P" checked>
                                    <label class="form-check-label" for="present<?= $eleve['idEleve'] ?>">Présent</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="presence[<?= $eleve['idEleve'] ?>]" id="absent<?= $eleve['idEleve'] ?>" value="A">
                                    <label class="form-check-label" for="absent<?= $eleve['idEleve'] ?>">Absent</label>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Enregistrer la présence</button>
        </form>
    </div>
    <!-- Lien vers Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
                    </htmL>