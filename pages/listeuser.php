<?php //ce fichier est utilisé pour le formulaire de login
session_start();

if ($_SESSION['rang'] == 3) {

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

<br>
<div class="container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
    
    <?php

require_once 'config.php';

?> 
<?php 

if (isset($_POST['delete'])){

$username = $_POST['delete'];

echo "
<div class='alert alert-info'>
  <strong>Notification : </strong> L'utilisateur \"<strong>$username</strong>\" a été supprimé !
</div>";

}

if (isset($_POST['modif'])){

  $username = $_POST['username'];
  $adresse = $_POST['mail'];
  $rang = $_POST['rang'];
  $id = $_POST['id'];

  $requete = " UPDATE users SET username = '$username', adressem = '$adresse', rang = '$rang' WHERE id = $id ";
  $resultat = mysqli_query($link, $requete)  or die ('ERREUR SQL ! <br/>' . $requete . '<br/>' . mysqli_error());
  
}

?>
			<!-- DEBUT PANNEL -->
			<div class="panel panel-default">
				<div class="panel-heading"><center><h4>Comptes utilisateurs</h4></center></div>
					<div class="panel-body">
        
          <br>
  <form action="listeusertrait.php" method="post">
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse e-mail</th>
      <th scope="col">Rang</th>
      <th scope="col">Créé le </th>
      <th scope="col" style="width:1%" class="invisible"></th>
      <th scope="col" style="width:1%" class="invisible"></th>
    </tr>
  </thead>
 
					  <?php

						$req6 = "SELECT id, username, adressem, rang, created_at FROM users";
            $res6 = mysqli_query($link, $req6) or die('ERREUR SQL ! <br/>' . $req6 . '<br/>' . mysqli_error());
           

           
						while ($user = mysqli_fetch_array($res6)) {
              
              extract($user);
             
              switch ($rang){

                case 1 : 
                  $rang = "gestionnaire";

                  echo "
              <tbody>
              <tr>
                <th scope='row'>$id</th>
                <td>$username</td>
                <td>$adressem</td>
                <td><strong>$rang</strong></td>
                <td>$created_at</td>
                <td><center><button type='button' class='btn' style='background: white' name='confirm' data-toggle='modal' data-target='#$username' value='$username'><span class='glyphicon glyphicon-remove' style='color : red'></span></button></center></td>
                <td><center><button type='submit' class='btn' style='background: white' name='modify' value='$username'><span class='glyphicon glyphicon-pencil' style='color : blue'></span></button></center></td> 
              </tr>
            </tbody>";

                    break; 

                case 2 :
                  $rang = "administrateur";

                  echo "
                  <tbody>
                  <tr>
                    <th scope='row'>$id</th>
                    <td>$username</td>
                    <td>$adressem</td>
                    <td><strong>$rang</strong></td>
                    <td>$created_at</td>
                    <td><center><button type='button' class='btn' style='background: white' name='confirm' data-toggle='modal' data-target='#$username' value='$username'><span class='glyphicon glyphicon-remove' style='color : red'></span></button></center></td>
                    <td><center><button type='submit' class='btn' style='background: white' name='modify' value='$username'><span class='glyphicon glyphicon-pencil' style='color : blue'></span></button></center></td> 
                  </tr>
                </tbody>";
                    break;

                case 3 : 
                  $rang = "superadministrateur";

                  echo "
                  <tbody>
                  <tr>
                    <th scope='row'>$id</th>
                    <td>$username</td>
                    <td>$adressem</td>
                    <td><strong>$rang</strong></td>
                    <td>$created_at</td>
                    <td style ='background : #EEEEEE'></td>
                    <td><center><button type='submit' class='btn' style='background: white' name='modify' value='$username'><span class='glyphicon glyphicon-pencil' style='color : blue'></span></button></center></td> 
                  </tr>
                </tbody>";
                    break;

              }

             
              
              
            ?>
            
                  <div class="modal fade" id="<?php echo  $username?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                            <h4 class='modal-title'><strong>Confirmation : </strong></h4>
                                    </div>
                                        <div class='modal-body'>
                                            <p> Voulez-vous supprimer l'utilisateur <strong>" <?php echo $username?> "</strong> ? </p>
                                        </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>
                                        <button type='submit' class='btn btn-primary' value ='<?php echo $username ?>' name='delete'>Oui</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
            <?php
						}
                        
              ?>
						

            
</table>						
</form>


					</div>
			</div>
			<!-- FIN PANNEL -->
		</div>
	</div>
</div>
</div>


