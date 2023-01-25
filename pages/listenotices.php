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

			<!-- DEBUT PANNEL -->
			<div class="panel panel-default">
				<div class="panel-heading"><center><h4>Notices créées</h4></center></div>
					<div class="panel-body">
        
          <br>
  <form action = "previewlist.php" method = "post">        
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width:5%">Numéro</th>
      <th scope="col" style="width:15%">Nom</th>
      <th scope="col" style="width:10%">État</th>
      <th scope="col" style="width:12%">Créée par :</th>
      <th scope="col" style="width:15%">Dernière modification par :</th>
      <th scope="col" style="width:15%">Archivée par :</th>
      <th scope="col" style="width:15%">Validée/Refusée par :</th>
      <th scope="col" style="width:5%">Aperçu :</th>


    </tr>
  </thead>
 

					  <?php

					  

						$req4 = "SELECT id, nom_notice, rang_notice, user_cree, user_modife, user_archive, user_valide  FROM notices_info";
            $res4 = mysqli_query($link, $req4) or die('ERREUR SQL ! <br/>' . $req4 . '<br/>' . mysqli_error());
           

           
						while ($notices = mysqli_fetch_array($res4)) {
              
              extract($notices);
             
              switch ($rang_notice){

                case 1 : 
                  $rang_notice = "<p style='color :blue'><strong>Créée </strong>(à confirmer)</p>";
                    break; 

                case 2 :
                  $rang_notice = "<p style='color :green'><strong> En ligne </strong><span class='glyphicon glyphicon-globe'></span> </p>";
                    break;

                case 3 : 
                  $rang_notice = "<p style ='color :red'><strong> Refusée </strong></p>";
                    break;

                case 4 :
                  $rang_notice = "<p style='color :orange'><strong> Archivée </strong></p>";
                    break;
              }

              if ($user_modife == '0'){
                $user_modife = 'Non modifiée';
              }

              if ($user_archive == '0'){
                $user_archive = 'Non archivée';
              } else {
                $user_archive = "<strong> $user_archive </strong>";
              }

              if ($user_valide == '0'){
                $user_valide = 'Non confirmée';
              } else {
                $user_valide = "<strong> $user_valide </strong>";
              }
              echo " 
              <tbody>
              
              <tr>
                <th scope='row'>$id</th>
                <td>$nom_notice</td>
                <td>$rang_notice</td>
                <td><strong>$user_cree</strong></td>
                <td>$user_modife</td>
                <td>$user_archive</td>
                <td>$user_valide</td>
                <td>" ?><center><button type="submit" class="btn" style = "background : white" value="<?php echo $nom_notice?>" name="preview"><span class=" glyphicon glyphicon-eye-open"   "></span></button></center><?php echo "</td>
              </tr>
            </tbody>";
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

