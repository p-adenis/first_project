<?php //ce fichier est utilisé pour le formulaire de login
session_start();

if ($_SESSION['rang'] == 1) {

	include("../assets/headerg_co.php");


} else if ($_SESSION['rang'] == 2) {

	include("../assets/headera_co.php");

} else if ($_SESSION['rang'] == 3) {

	include("../assets/headersa_co.php");
}

require_once 'config.php';

?>
<?php
// Initialisation de la session 

    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	header("location: login.php");
	exit;
}

?>

<?php 

$nom_notice = $_POST['modife'];

    $sql = " SELECT * FROM liste INNER JOIN format_video ON format_video.id = liste.id_video JOIN format_audio ON format_audio.id = liste.id_audio JOIN format_textesimp ON format_textesimp.id = liste.id_textsimp JOIN notices_info ON notices_info.id = liste.id_info WHERE nom_notice = '$nom_notice'";
    $req = mysqli_query($link, $sql);

      while ($notices = mysqli_fetch_array($req)) {

        extract($notices);
    }

    $sql1 = " SELECT format_video.id idvideo, format_audio.id idaudio, format_textesimp.id idtexte, notices_info.id idinfo, liste.id idliste FROM liste INNER JOIN format_video ON format_video.id = liste.id_video JOIN format_audio ON format_audio.id = liste.id_audio JOIN format_textesimp ON format_textesimp.id = liste.id_textsimp JOIN notices_info ON notices_info.id = liste.id_info ";
    $req1 = mysqli_query($link, $sql1);

      while ($id = mysqli_fetch_array($req1)) {

        extract ($id);

      }


      ?>



<div class="container-fluid">
	<form method="POST" action="voirmodif.php" enctype="multipart/form-data">	
		<div class="form-group">
			<!-- DEBUT PANNEL INFO NOTICE -->
      <div class="panel panel-default">
        <div class="panel panel-heading"><center><h4>Modification de la notice : <strong><?php echo $nom_notice ?></strong></center></h4></div>
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
      <td><input type="text" class="form-control" name="nom" value="<?php echo $nom_notice ?>"></td>
     </tr>

	 <tr>
      <th scope="row">Image de la notice : </th>
      <td><?php echo $notice_image ?><hr>Nouveau fichier : <input type="file" class="file" name="image"></td>
     </tr>

	 <tr>
      <th scope="row">Lien de la notice ANSM (url) : </th>
      <td><input type="text" class="form-control" name="lien" value="<?php echo $url_ansm?>"></td>
     </tr>
</tbody>
</table>
					</div>
				</div>

			<!-- FIN PANNEL INFO NOTICE -->

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
      <td><?php echo $presentation_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]" value="<?php echo test ?>"></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>
      <td><?php echo $utilisation_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><?php echo $trouble_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      <td><?php echo $contreindication_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><?php echo $interaction_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><?php echo $effets_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><?php echo $recommandation_video ?><hr>Nouveau fichier : <input type="file" class="file" name="video_array[]"></td>
      
     
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
      <td><?php echo $presentation_audio ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>
      <td><?php echo $utilisation_audio ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><?php echo $trouble_audio ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      <td><?php echo $contreindication_audio ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><?php echo $interaction_audio ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><?php echo $effets_video ?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><?php echo $recommandation_audio?><hr>Nouveau fichier : <input type="file" class="file" name="audio_array[]"></td>
     
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
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $presentation_textesimp ?></textarea></td>
     
    </tr>
    <tr>
      <th scope="row">Comment le prendre ?</th>
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $utilisation_textesimp ?></textarea></td>
      
    </tr>
    <tr>
      <th scope="row">Surdosage et omission</th>
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $trouble_textesimp ?></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Contre-indications et grossesse</th>
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $contreindication_textesimp ?></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Interactions</th>
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $interaction_textesimp ?></textarea></td>
     
    </tr>

	<tr>
      <th scope="row">Effets indésirables</th>
      <td><textarea name="text_array[]" class="ckeditor"><?php echo $effets_textesimp ?></textarea></td>
     
    </tr>
	<tr>
      <th scope="row">Recommandations</th>
      <td><textarea name="text_array[]"  class="ckeditor" ><?php echo $recommandation_textesimp ?></textarea></td>
     
    </tr>
  </tbody>
</table>
				</div>
			
				</div>
					<!-- FIN PANNEL TEXT -->
          </div>
          </div>
          <center>
          <input type="hidden" name ="idtexte" value="<?php echo $idtexte ?>">
          <input type="hidden" name ="idvideo" value="<?php echo $idvideo ?>">
          <input type="hidden" name ="idaudio" value="<?php echo $idaudio ?>">
          <input type="hidden" name ="idinfo" value="<?php echo $idinfo ?>">
          <input type="hidden" name ="idliste" value="<?php echo $idliste ?>">


          <input type="submit" class="btn btn-primary btn-lg" value="Modifier" name="modif">
          </center>
    </div>
  </div>
</div> 
		</form>
	</div>