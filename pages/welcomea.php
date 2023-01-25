<?php //ce fichier est utilisé pour le formulaire de login
session_start();

if ($_SESSION['rang'] == 1) {

 include("../assets/headerg_co.php");

} else if ($_SESSION['rang'] == 2) {

 include("../assets/headera_co.php");  

} else if ($_SESSION['rang'] == 3) {

 include("../assets/headersa_co.php");  
}
?>
<?php
// Initialize the session


// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<div class="container-fluid">
  <div class="row"> 
    <div class="col-md-4"></div>
    <div class="col-md-4"><center><h1>Bienvenue sur  <br>  l'Administration de l'URAPEDA</h1><br></center></div>
    <div class="col-md-4">
</div>
    </div>

  <br>
  <br>
  
  
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="panel panel-default">
      <div class="panel-heading"><h4><center> Que souhaitez vous faire ? </center></h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3">
              <div class="panel panel-default">
              <div class="panel-heading"><h4><center>Créer</center></h4></div>
                <div class="panel-body">
                <a href="creernotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-pencil'></span>
                  </button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><center>Modifier</center></h4></div>
                  <div class="panel-body">
                  <a href="modifiernotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-edit'></span>
                  </button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="panel panel-default">
              <div class="panel-heading"><h4><center>Archiver</center></h4></div>
                <div class="panel-body">
                <a href="archivernotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-folder-open'></span>
                  </button>
                </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="panel panel-default">
            <div class="panel-heading"><h4><center>Supprimer</center></h4></div>
                <div class="panel-body">
                <a href="supprimernotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-trash'></span>
                  </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="panel panel-default">
            <div class="panel-heading"><h4><center>Valider/Refuser</center></h4></div>
                <div class="panel-body">
                <a href="validernotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-ok '></span><?php echo "  "?><span class='glyphicon glyphicon-remove '></span>
                  </button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-default">
            <div class="panel-heading"><h4><center>Listes</center></h4></div>
                <div class="panel-body">
                <a href="listenotices.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-th-list'></span>
                  </button>
                </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-default">
            <div class="panel-heading"><h4><center>Créer gestionnaires</center></h4></div>
                <div class="panel-body">
                <a href="creergestionnaires.php">
                  <button type='button' class='btn btn-lg btn-block btn-success' style>
                    <span class='glyphicon glyphicon-user'></span>
                  </button>
                </a>
                </div>
              </div>
            </div>
            

        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>