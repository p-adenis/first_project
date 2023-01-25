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
	<form method="POST" action="traitementfile.php" enctype="multipart/form-data">	
		<div class="form-group">
			<!-- DEBUT PANNEL INFO NOTICE -->
      <div class="panel panel-default">
        <div class="panel panel-heading"><center><h4>Créer une notice </center></h4></div>
        <div class="panel panel-body">
				<div class="panel panel-default">
					<div class="panel-heading"><center><h5>Informations notice</center></h5></div>
					<div class="panel-body">
					<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 15%"></th>
      <th scope="col">Informations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Nom de la notice : </th>
      <td><input type="text" class="form-control" name="nom"></td>
     </tr>

	 <tr>
      <th scope="row">Image de la notice : </th>
      <td><input type="file" class="file" name="image"></td>
     </tr>

	 <tr>
      <th scope="row">Lien de la notice ANSM (url) : </th>
      <td><input type="text" class="form-control" name="lien"></td>
     </tr>
</tbody>
</table>
					</div>
				</div>

			<!-- FIN PANNEL INFO NOTICE -->

			<!-- DEBUT PANNEL LSF -->
			<div class="panel panel-default">
				<div class="panel-heading"><center><h5>Format LSF</center></h5></div>
				<div class="panel-body">
				<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 15%"></th>
      <th scope="col">Fichiers vidéo</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Présentation</th>

      <td><input type="file" class="file" name="video_array[]"></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>
      <td><input type="file" class="file" name="video_array[]"></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      <td><input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><input type="file" class="file" name="video_array[]"></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><input type="file" class="file" name="video_array[]"></td>
      
     
    </tr>
  </tbody>
</table>
				</div>
			</div>
			<!-- FIN PANNEL LSF -->

			<!-- DEBUT PANNEL AUDIO -->
			<div class="panel panel-default">
				<div class="panel-heading"><center><h5>Format Audio </center></h5></div>
				<div class="panel-body">
				<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 15%"></th>
      <th scope="col">Fichiers audio</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Présentation</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>

      <td><input type="file" class="file" name="audio_array[]"></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><input type="file" class="file" name="audio_array[]"></td>
     
    </tr>
  </tbody>
</table>
				</div>
			</div>
	<!-- FIN PANNEL AUDIO -->

	<!-- DEBUT PANNEL TEXTE -->
	<div class="panel panel-default">
				<div class="panel-heading"><center><h5>Format Texte simplifié</center></h5></div>
				<div class="panel-body">
				<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 15%"></th>
      <th scope="col">Description</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Présentation</th>
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><textarea name="text_array[]" class="ckeditor"></textarea></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><textarea name="text_array[]"  class="ckeditor" ></textarea></td>
     
    </tr>
  </tbody>
</table>
				</div>
			
				</div>
					<!-- FIN PANNEL TEXT -->
          </div>
          </div>
          <center>
          <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" name="preview"> 
            <span class="btn glyphicon glyphicon-eye-open"></span>
          </button>
          <input type="submit" class="btn btn-success btn-lg" value="Créer" name="creer">
          </center>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><center>Prévisualisation en cours...</center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <center><p>Chargement des fichiers ... Cette action peut durer quelques minutes</p></center>
        <br>
        <div class="ball"></div></div>

      </div>
    </div>
  </div>
</div>
          
          
				</form>
			</div>
	</body>
</html>