<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Élève</title>
</head>
<body>
    <?php
      require_once('cnx.php');
        try{
            $Res=$conn->query("SELECT * FROM ecole");
            $r=$Res->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "<p> Erreur = ".$e->getMessage()." ligne=".$e->getLine()."</p>";
            
        }
      
    try{
        $Res=$conn->query("SELECT * FROM classe");
        $c=$Res->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "<p> Erreur = ".$e->getMessage()." ligne=".$e->getLine()."</p>";
        
    }


    ?>
    <h2>Inscription Élève</h2>
    <form action="ajouteleve.php" method="post">
        <label for="idEleve">Identifiant Élève:</label><br>
        <input type="text" id="idEleve" name="idEleve" required><br><br>
        
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom" required><br><br>
        
        <label for="dateNaissance">Date de Naissance:</label><br>
        <select name="dateNaissance" id="dateNaissance">
            <?php 
                $year=date("Y");
                for($a=2010;$a<=$year;$a++)

                   if($a==$dateNaissance)
                        echo "<option value='$a' selected>$a</option>";
                    else
                    echo "<option value='$a'>$a</option>";
            ?> 
            </select><br>
            <label for="sexe">Sexe:</label><br>
        <select id="sexe" name="sexe" required>
            <option value="Masculin">Masculin</option>
            <option value="Feminin">Féminin</option>
        </select><br><br>
        <label for="idEcole">Ecole:</label>
        <select name="idEcole" id="idEcole">
            <?php
                foreach($r as $row)
                    echo "<option value='$row[idEcole]'>$row[nomEcole]</option>";
            ?>
        </select><br>
        <label for="niveau">Niveau:</label><br>
        <select id="niveau" name="niveau" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br><br>
        <label for="groupe">Groupe:</label><br>
        <select id="groupe" name="groupe" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br><br>
        
        
        
        <label for="idParent">Identifiant Parent:</label><br>
        <input type="text" id="idParent" name="idParent" required><br><br>

        <input type="submit" value="Inscrire">
    </form>
</body>
</html>
