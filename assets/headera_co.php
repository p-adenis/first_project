<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  
  <title>Notices Urapeda</title>    
</head>
<body>

 <nav class="navbar navbar-default" style="background-color: #4E4C4A ">
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Navbar</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../pages/welcomea.php" style="color: white">Accueil</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
   
      <ul class="nav navbar-nav">
        <li><a href="../pages/creernotices.php"  style="color: white">Créer notices</a></button></li>
        <li><a href="../pages/modifiernotices.php"  style="color: white">Modifier notices</a></li>
        <li><a href="../pages/archivernotices.php"  style="color: white">Archiver notices</a></li>
        <li><a href="../pages/supprimernotices.php"  style="color: white">Supprimer notices</a></li>
        <li><a href="../pages/validernotices.php"  style="color: white">Valider notices</a></li>
        <li><a href="../pages/listenotices.php"  style="color: white">Liste des notices</a></li>          
        <li><a href="../pages/creergestionnaires.php"  style="color: white">Créer gestionnaires</a></li>
        
        </ul>
        </li>

</ul>

      <div class="nav navbar-nav navbar-form pull-right">
        <li style="color:white"><h5>Connecté en tant que : <b><?php echo $_SESSION['username']; ?></b>&nbsp &nbsp &nbsp</h5></li>
        <button class="btn btn-default" type="button"><a href="../pages/logout.php">Déconnexion</a></button>
        
      </div>
    </div>
  </div>
</nav>
