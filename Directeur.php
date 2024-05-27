<?php
require_once("cnx.php");
require_once("autorisation.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
        @import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
        @import url('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
        body {
            background-color: #ECF0F5;
            color: #ddd;
            font-family: 'Open Sans', sans-serif;
            padding: 0;
            margin: 0;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }
        .sidebar-toggle {
            margin-left: -240px;
        }
        .sidebar {
            width: 240px;
            height: 200%;
            background: #293949;
            position: absolute;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            z-index: 100;
            animation-name: slidein;
            animation-duration: 3s;
        }
        .sidebar #leftside-navigation ul,
        .sidebar #leftside-navigation ul ul {
            margin: -2px 0 0;
            padding: 0;
        }
        .sidebar #leftside-navigation ul li {
            list-style-type: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .sidebar #leftside-navigation ul li.active > a {
            color: #1abc9c;
        }
        .sidebar #leftside-navigation ul li.active ul {
            display: block;
        }
        .sidebar #leftside-navigation ul li a {
            color: #aeb2b7;
            text-decoration: none;
            display: block;
            padding: 18px 0 18px 25px;
            font-size: 12px;
            outline: 0;
            -webkit-transition: all 200ms ease-in;
            -moz-transition: all 200ms ease-in;
            -o-transition: all 200ms ease-in;
            -ms-transition: all 200ms ease-in;
            transition: all 200ms ease-in;
        }
        .sidebar #leftside-navigation ul li a:hover {
            color: #1abc9c;
        }
        .sidebar #leftside-navigation ul li a span {
            display: inline-block;
        }
        .sidebar #leftside-navigation ul li a i {
            width: 20px;
        }
        .sidebar #leftside-navigation ul li a i .fa-angle-left,
        .sidebar #leftside-navigation ul li a i .fa-angle-right {
            padding-top: 3px;
        }
        .sidebar #leftside-navigation ul ul {
            display: none;
        }
        .sidebar #leftside-navigation ul ul li {
            background: #23313f;
            margin-bottom: 0;
            margin-left: 0;
            margin-right: 0;
            border-bottom: none;
        }
        .sidebar #leftside-navigation ul ul li a {
            font-size: 12px;
            padding-top: 13px;
            padding-bottom: 13px;
            color: #aeb2b7;
        }
        .Main {
            margin-left: 250px;
        }
        #openandclose {
            display: none;
        }
        @media only screen and (max-width: 700px) {
            .sidebar {
                display: none;
            }
            .main-header {
                display: none;
            }
            .Main {
                margin-left: 0;
                margin: 10px;
            }
            #closebtn {
                display: none;
                font-size: 20px;
                color: #367FA9;
            }
            #openandclose {
                display: flex;
            }
            #openbtn {
                display: flex;
                font-size: 20px;
                color: #65b4be;
            }
            .centered {
                margin: 0 auto;
                text-align: center
            }
        }
        /* Nouveaux styles pour les cartes (cards) */
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .panel-icon {
            font-size: 40px;
            text-align: center;
            margin-bottom: 15px;
        }

        .panel-text {
            text-align: center;
        }

        .huge {
            font-size: 36px;
        }

        .admin-stat {
            color: #FF5733; /* Couleur pour les administrateurs */
        }

        .directeur-stat {
            color: #FFC300; /* Couleur pour les directeurs */
        }

        .parent-stat {
            color: #36A2EB; /* Couleur pour les parents */
        }

        .eleve-stat {
            color: #33FF57; /* Couleur pour les élèves */
        }
    </style>
    <script src="https://kit.fontawesome.com/70a642cd7c.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script>
        function openNav() {
            document.getElementById("sidebar").style.display = "block";
            document.getElementById("openbtn").style.display = "none";
            document.getElementById("closebtn").style.display = "flex";
            document.getElementById("Main").style.marginleft = "60px";
            document.getElementById("Main").style.opacity = "0.2";
        }

        function closeNav() {
            document.getElementById("sidebar").style.display = "none";
            document.getElementById("openbtn").style.display = "flex";
            document.getElementById("closebtn").style.display = "none";
            document.getElementById("Main").style.marginleft = "0";
            document.getElementById("Main").style.opacity = "";
        }
    </script>
</head>
<body>
<div class="btn" id="openandclose" style="margin: 10px 0px 10px 10px; background-color:#367FA9;">
    <a class="openbtn" onclick="openNav()" id="openbtn"><i class="fa fa-bars" style="color:white;"></i></a>

    <a class="closebtn" onclick="closeNav()" id="closebtn"><i class="fas fa-times" style="color:white;"></i></a>
</div>

<header class="main-header" id="main-header" style="padding:0.1px 0.1px 0.1px 70px; margin:0px; background-color:#367FA9">
    <!-- Logo -->
    <h2>Directeur:<?=$_SESSION["username"]?></h2>
</header>
<aside class="sidebar" id="sidebar">
    <div id="leftside-navigation" class="nano">
        <ul class="nano-content">
        <li class="sub-menu">
                <a href="javascript:void(0);"><i class="fa fa-users"></i><span>Les Eleve</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                <ul>
                    <li><a href="liste_eleve.php"><i class="fa fa-circle-o"></i>Afficher les Eleves</a></li>
                    <li><a href="Form_ajouter_eleve.php"><i class="fa fa-user-plus"></i>Ajouter un Eleve</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:void(0);"><i class="fa fa-users"></i><span>Parent</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                <ul>
                    <li><a href="formajoutparent.php"><i class="fa fa-user-plus"></i>Ajouter un Compte parent</a></li>
                </ul>
            </li>
            <li class="sub-menu">
        <a href="moyenneG.php"><i class="fa fa-files-o"></i><span>Les Moyenne</span></a>
      </li>
      <li class="sub-menu">
        <a href="note_eleve.php"><i class="fa fa-files-o"></i><span>Les Note</span></a>
      </li>
      <li class="sub-menu">
        <a href="gestion_absence.php"><i class="fa fa-files-o"></i><span> Absences</span></a>
      </li>
           
            <li class="sub-menu">
                <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
            </li>
            <li class="sub-menu">
                <a href="#"><i class="fa fa-cogs"></i><span>Paramètres</span></a>
            </li>
            <li class="sub-menu">
                <a href="deconnexion.php"><i class="fa fa-sign-out"></i><span>Déconnecter</span></a>
            </li>
        </ul>
    </div>
</aside>
<div class="Main" id="Main">
    <div class="row">
        <?php
        try {
            // Connexion à la base de données
            $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");

            // Requête pour récupérer le nombre d'administrateurs
            $sql_admin = "SELECT COUNT(*) AS count_admin FROM administrateur";
            $result_admin = $conn->query($sql_admin);
            $row_admin = $result_admin->fetch(PDO::FETCH_ASSOC);

            // Requête pour récupérer le nombre de directeurs
            $sql_directeur = "SELECT COUNT(*) AS count_directeur FROM directeur";
            $result_directeur = $conn->query($sql_directeur);
            $row_directeur = $result_directeur->fetch(PDO::FETCH_ASSOC);

            // Requête pour récupérer le nombre de parents
            $sql_parent = "SELECT COUNT(*) AS count_parent FROM parents";
            $result_parent = $conn->query($sql_parent);
            $row_parent = $result_parent->fetch(PDO::FETCH_ASSOC);

            // Requête pour récupérer le nombre d'élèves
            $sql_eleve = "SELECT COUNT(*) AS count_eleve FROM eleve";
            $result_eleve = $conn->query($sql_eleve);
            $row_eleve = $result_eleve->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="col-sm-3">
            <div class="card" style="background-color: #F8D7DA;">
                <div class="card-body">
                    <div class="panel-icon">
                        <i class="fas fa-user-secret admin-stat"></i>
                    </div>
                    <div class="panel-text" style="color: #212529;">
                        <div class="huge"><?php echo $row_admin['count_admin']; ?></div>
                        Administrateurs
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="background-color: #FFEEBA;">
                <div class="card-body">
                    <div class="panel-icon">
                        <i class="fas fa-user-tie directeur-stat"></i>
                    </div>
                    <div class="panel-text" style="color: #212529;">
                        <div class="huge"><?php echo $row_directeur['count_directeur']; ?></div>
                        Directeurs
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="background-color: #D4EDDA;">
                <div class="card-body">
                    <div class="panel-icon">
                        <i class="fas fa-users parent-stat"></i>
                    </div>
                    <div class="panel-text" style="color: #212529;">
                        <div class="huge"><?php echo $row_parent['count_parent']; ?></div>
                        Parents
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="background-color: #CCE5FF;">
                <div class="card-body">
                    <div class="panel-icon">
                        <i class="fas fa-child eleve-stat"></i>
                    </div>
                    <div class="panel-text" style="color: #212529;">
                        <div class="huge"><?php echo $row_eleve['count_eleve']; ?></div>
                        Élèves
                    </div>
                </div>
            </div>
        </div>
        <!-- Ajoutez les autres colonnes de statistiques ici -->
        <?php
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        ?>
    </div>
</div>

</body>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="js/index.js"></script>
</html>
