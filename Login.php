<?php
// Vérifie si une session est déjà active, sinon démarre une nouvelle session
if (!session_id()) {
    session_start();
}
require_once("cnx.php");
require("autorisation.php");

// Récupération des données du formulaire
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$pwd = isset($_POST["password"]) ? $_POST["password"] : "";

// Requête SQL pour sélectionner l'utilisateur en fonction de l'email et du mot de passe
$res = $conn->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = :username AND motDePasse = :pwd");
$res->bindParam(":username", $username);
$res->bindParam(":pwd", $pwd);

$res->execute();

// Récupération des résultats
$data = $res->fetchAll(PDO::FETCH_ASSOC);

// Vérification du nombre de résultats
if (count($data) != 1) {
    // Si aucun utilisateur correspondant n'est trouvé, redirige vers la page d'accueil avec le paramètre d'erreur
    header("location:index.php?error=1");
    exit(); // Arrêter l'exécution du script après la redirection
} else {
    switch ($data[0]["typ"]) {
        case "Directeur":
            // Si l'utilisateur est un Directeur, redirige vers la page Directeur.php
            $_SESSION["jeton"] = "pass";
            $_SESSION["username"] = $data[0]["nom"];
            header("location:Directeur.php");
            exit(); // Arrêter l'exécution du script après la redirection
            break;
        case "Admin":
            // Utilisateur trouvé, stocke les informations dans la session
            $_SESSION["jeton"] = "pass";
            $_SESSION["username"] = $data[0]["prenom"];
            header("location:Adminstrateur.php");
            exit(); // Arrêter l'exécution du script après la redirection
            break;
        case "Parent":
            $_SESSION["username"] = $username;
            header("location:Parent.php");
            exit(); // Arrêter l'exécution du script après la redirection
            break;
        case "Elève":
            $_SESSION["username"] = $username;
            $_SESSION["jeton"] = "pass";
            // Si l'utilisateur est un Elève, redirige vers la page Eleve.php
            header("location:Eleve.php");
            exit();
        case "Directeur":
            $_SESSION["jeton"] = "pass";
            $_SESSION["username"] = $data[0]["nom"];
            // Si l'utilisateur est un Elève, redirige vers la page Eleve.html
            header("location:Directeur.php");
            exit(); // Arrêter l'exécution du script après la redirection
            break;
        default:
            // Si le type d'utilisateur n'est pas reconnu, redirige vers une page d'erreur
            header("location:index.php");
            exit(); // Arrêter l'exécution du script après la redirection
            break;
    }
}
?>
