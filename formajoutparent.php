<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte Parent</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez votre propre CSS personnalisé ici */
    </style>
</head>
<body>
    <div class="container">
        <h2>Créer un compte Parent</h2>
        <form action="ajoutparent.php" method="post">
            <div class="form-group">
                <label for="idParent">Identifiant Parent:</label>
                <input type="text" class="form-control" id="idParent" name="idParent" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="motDePasse"></label>
            
            </div>
            <button type="submit" class="btn btn-primary">Créer le compte</button>
        </form>
    </div>

    <!-- Bootstrap JS et jQuery (nécessaire pour Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
