<html>
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
@import url('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
body {
  background-color: #ECF0F5;
  color: #5D5F63;
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
  height: 150%;
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
.Main{
     margin-left: 250px;
}
#openandclose{
     display: none;
}  
@media only screen and (max-width: 700px) {
.sidebar{
  display: none;
}
.main-header{
  display: none;
}
.Main{
     margin-left: 0;
     margin: 10px;
}   
#closebtn{
     display: none;
     font-size: 20px;
     color:#367FA9;
}
#openandclose{
     display: flex;
}  
#openbtn{
     display: flex;
     font-size: 20px;
     color:#367FA9;
}    
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
<div class="btn" id="openandclose"style="margin: 10px 0px 10px 10px; background-color:#367FA9;">
<a class="openbtn" onclick="openNav()" id="openbtn"><i class="fa fa-bars" style="color:white;"></i></a>
    
  <a class="closebtn" onclick="closeNav()" id="closebtn"><i class="fas fa-times" style="color:white;"></i></a>
</div>  

<header class="main-header" id="main-header" style="padding:0.1px 0.1px 0.1px 70px; margin:0px; background-color:#367FA9">
    <!-- Logo -->

      <span class="logo-lg" ><h2>ADMIN</h2></span>
  </header>
<aside class="sidebar" id="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="fa fa-users"></i><span>Les Etudiants</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>

          <li><a href="liste.php?type=etudiant"><i class="fa fa-circle-o"></i>Afficher les Etudiants</a>
          </li>
          <li><a href="create.php?type=etudiant"><i class="fa fa-user-plus"></i>Ajouter un Etudiant</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="fa fa-users"></i><span>Les Professeurs</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="liste.php?type=professeur"><i class="fa fa-circle-o"></i>Afficher les Professeurs</a>
          </li>

          <li><a href="create.php?type=professeur"><i class="fa fa-user-plus"></i>Ajouter un Professeur</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="fa fa-files-o"></i><span>Les Modules</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="liste.php?type=module"><i class="fa fa-circle-o"></i>Afficher les Modules</a>
          </li>

          <li><a href="create.php?type=module"><i class="fa fa-circle-o"></i>Ajouter un Module</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i><span>Les Notes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="listenote.php"><i class="fa fa-circle-o"></i>Insérer les Notes</a>
          </li>

          <li><a href="create.php?type=examen"><i class="fa fa-circle-o"></i>Ajouter un Examen</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="fa fa-file-pdf-o"></i><span>Délibiration</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="delib.php?type=delibmodule"><i class="fa fa-circle-o"></i>Délibiration Par Module</a>
          </li>
          <li><a href="delib.php?type=delibsemestre"><i class="fa fa-circle-o"></i>Délibiration Par Semestre</a>
          </li>
          <li><a href="delib.php?type=delibannee"><i class="fa fa-circle-o"></i>Délibiration Par Année</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
      </li>
      <li class="sub-menu">
        <a href="settings.php"><i class="fa fa-cogs"></i><span>Paramètres</span></a>
      </li>
      <li class="sub-menu">
        <a href="logout.php"><i class="fa fa-sign-out"></i><span>Déconnecter</span></a>
      </li>
    </ul>
  </div>
</aside>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

    <script src="js/index.js"></script>
</html>