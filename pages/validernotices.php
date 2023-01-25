<?php //ce fichier est utilisé pour le formulaire de login
session_start();

if ($_SESSION['rang'] == 1) {

    header("location: welcome.php");

} else if ($_SESSION['rang'] == 2) {

    include("../assets/headera_co.php");

} else if ($_SESSION['rang'] == 3) {

    include("../assets/headersa_co.php");
}
?>
<?php
// Initialize the session


// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>
<?php

require_once 'config.php';

?> 
<?php

if (isset($_POST['accept'])) {

    $nom_notice = $_POST['accept'];
    $user_valide = $_SESSION['username'];

    $sql = "UPDATE notices_info SET rang_notice=2, user_valide ='$user_valide' WHERE nom_notice='$nom_notice'";
    $res = mysqli_query($link, $sql) or die ('ERREUR SQL ! <br/>' . $sql . '<br/>' . mysqli_error());

    echo "<div class='alert alert-success'>
    <strong>Notification : </strong> La notice <strong> \" $nom_notice \" </strong> à été validée et publiée ! 
    </div>";   
}

if (isset($_POST['refus'])) {

    $nom_notice= $_POST['refus'];

    $sql1 = "UPDATE notices_info SET rang_notice=3 WHERE nom_notice='$nom_notice'";
    $res1 = mysqli_query($link, $sql1) or die ('ERREUR SQL ! <br/>' . $sql1 . '<br/>' . mysqli_error());
    
    echo "<div class='alert alert-danger'>
    <strong>Notification : </strong> La notice <strong>\"$nom_notice\" </strong> à été refusée à la publication ! Vous pouvez modifier cette notice <a href='modifiernotices.php'> en cliquant ici </a> ! 
    </div>";
}




?>

<br>
<div class="container-fluid">
<div class="row">

<div class="col-md-3"></div>    
		<div class="col-md-6">
        <form action="" method="post">

			<!-- DEBUT PANNEL -->
            <div class="panel panel-default">
                <div class="panel-heading"><center><h4>Listes des notices à confirmer : </h4></center></div>
                    <div class="panel-body" style="min-height: 740px;">
                    <label> Quelle notice souhaitez-vous valider/refuser ?: </label>
                    <br>
                    <br>
                    <?php


                    $req4 = "SELECT nom_notice FROM notices_info WHERE rang_notice = 1 ";
                    $res4 = mysqli_query($link, $req4) or die('ERREUR SQL ! <br/>' . $req4 . '<br/>' . mysqli_error());

                    
                    while ($notices = mysqli_fetch_array($res4)) {

                        extract($notices);
                        $id_notices = str_replace(' ','',$nom_notice);
                       
                        
                       
                        echo "                        
                        <li class='list-group-item'> <div  style='margin-top: 0.8em'>  $nom_notice </div> 
                            <div align='right' style='margin-top: -2em'>
                            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#$id_notices"."V'>
                            <span class='glyphicon glyphicon-ok'></span>
                        </button>
                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#$id_notices"."R' value='$nom_notice'>
                    <span class='glyphicon glyphicon-remove'></span>
                </button>
                </div>
                </li>
                        
                        <div class='modal fade' id='$id_notices"."V' tabindex='-1' role='dialog'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                            <h4 class='modal-title'><strong>Confirmation : </strong></h4>
                                    </div>
                                        <div class='modal-body'>
                                            <p>Voulez-vous autoriser la publication de <strong> \"$nom_notice\"</strong> ?</p>
                                        </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Annuler</button>
                                        <button type='submit' class='btn btn-success' value ='$nom_notice' name='accept'>Oui</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->";

                        echo "
                
                <div class='modal fade' id='$id_notices"."R'tabindex='-1' role='dialog'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title'><strong>Confirmation : </strong></h4>
      </div>
      <div class='modal-body'>          
        <p>Voulez-vous refuser la publication de <strong> \"$nom_notice\"</strong> ?</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Annuler</button>
        <button type='submit' class='btn btn-success' value ='$nom_notice' name='refus'>Oui</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
</form>";
                    } 
                    if (mysqli_num_rows($res4)==0){
                        ?>
                       <center><i>La liste des notices à confirmer est <strong> vide </strong></i></center>
                        <?php
                    }


                    

                    ?>
                        
                   </form>
                    </div>
            </div>
			<!-- FIN PANNEL -->
            

		</div>
        <div class="col-md-3"></div>  
        </div>

	</div>
    




