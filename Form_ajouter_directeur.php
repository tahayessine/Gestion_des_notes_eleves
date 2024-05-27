<?php
    require_once("cnx.php");
    require_once("autorisation.php");
    try{
        $Res=$conn->query("SELECT * FROM ecole");
        $r=$Res->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "<p> Erreur = ".$e->getMessage()." ligne=".$e->getLine()."</p>";
        
    }
  
    

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un directeur</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Ajouter un directeur</h2>

    <form method="post" action="ajout_directeur.php">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

       

        <label for="idEcole">Ecole:</label>
        <select name="idEcole" id="idEcole">
            <?php
                foreach($r as $row)
                    echo "<option value='$row[idEcole]'>$row[nomEcole]</option>";
            ?>
        </select><br>

        <button type="submit" class="btn btn-primary">Ajouter le directeur</button>
    </form>
</div>

<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
