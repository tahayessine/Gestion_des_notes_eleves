<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des écoles</title>
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
                <?php
                // Connexion à la base de données
                require_once('cnx.php');
                require_once('autorisation.php');

                $query = $conn->query("SELECT * FROM ecole");

    // Vérifier si des élèves ont été trouvés
    if ($query->rowCount() > 0) {
        echo "<table class='table'>";
        echo "<thead class='thead-dark'><tr><th>IDEcole</th><th>Nom</th><th>Adresse</th><th>Ville</th><th>Codepostal</th>";
        

        // Afficher les données des élèves
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
        
            echo "<td>".$row['idEcole']."</td>";
            echo "<td>".$row['nomEcole']."</td>";
            echo "<td>".$row['adresse']."</td>";
            echo "<td>".$row['ville']."</td>";
            echo "<td>".$row['codePostal']."</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Aucun élève trouvé dans la base de données.";
    }

                
             
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
