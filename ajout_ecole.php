<?php
require_once("cnx.php");
require_once("autorisation.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nomEcole = $_POST["nomEcole"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codePostal = $_POST["codePostal"];


   try{
    $query = "INSERT INTO ecole (nomEcole , adresse, ville, codePostal) VALUES (:nomEcole,  :adresse, :ville, :codePostal)";
        $stmt = $conn->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':nomEcole', $nomEcole);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':codePostal', $codePostal);
      
        
    

        // Exécution de la requête
        if ($stmt->execute()) {
            $last_id = $conn->lastInsertId(); // Récupérer l'ID de l'élève nouvellement inséré
            echo "L'Ecole (ID: $last_id) $nomEcole $ville a été ajouté avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout de lecole.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
   
?>
