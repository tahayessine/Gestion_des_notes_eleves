<?php
    require_once("cnx.php");
    require_once("autorisation.php");
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une école</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Ajouter une école</h2>
        <form action="ajout_ecole.php" method="post">
            
            <div class="form-group">
                <label for="nomEcole">Nom de l'école:</label>
                <input type="text" class="form-control" id="nomEcole" name="nomEcole" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="form-group">
                <label for="codePostal">Code Postal:</label>
                <input type="text" class="form-control" id="codePostal" name="codePostal" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
