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
 
 if (isset($_POST['preview'])){
      $nom_notice = $_POST['preview'];

 $sql = "SELECT * FROM liste INNER JOIN format_audio ON liste.id_audio = format_audio.id  INNER JOIN format_textesimp ON liste.id_textsimp = format_textesimp.id INNER JOIN format_video ON liste.id_video = format_video.id INNER JOIN notices_info ON liste.id_info = notices_info.id WHERE nom_notice ='$nom_notice'";
 $res = $link->query($sql) or die('Erreur  ! <br/>' . $sql . '<br/>' . $link->error); 

 while ($notice = mysqli_fetch_array($res)) {
              
      extract($notice);

          
  }
      ?>
  <div class="container-fluid">
      <div class="row">
            <div class="col-md-3">
                  <a href="<?php echo $url_ansm ?>"> <button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search"></span>&nbsp Notice ANSM</button></a>
            </div>
            <div class="col-md-6">
                  
                        <center><h4><strong><?php echo $nom_notice ?></strong></h4></center>
                        <center><img src=" <?php echo '../files/'. $notice_image  ?> " style=" max-width:50% ; max-height=50% "></center>

                        <!-- PANNEL PREVIEW VIDEO -->

                        <div class="panel panel-default">
                        <div class="panel-heading"><center><h4>Format LSF</h4></center></div>
                        <div class="panel-body">
                        <p>Présentation</p>
                        <center><video controls src='../files/<?php echo $presentation_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Comment le prendre ?</p>
                        <center><video controls src='../files/<?php echo $utilisation_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Surdosage et Omission</p>
                        <center><video controls src='../files/<?php echo $trouble_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Contre-indications et grossesse</p>
                        <center><video controls src='../files/<?php echo $contreindication_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Interactions</p>
                        <center><video controls src='../files/<?php echo $interaction_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Effets indésirables</p>
                        <center><video controls src='../files/<?php echo $effets_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Recommandations</p>
                        <center><video controls src='../files/<?php echo $recommandation_video ?>'style=" max-width:50% ; max-height=50% "></center>
                        </div>
                        </div>

                        <!--PANEL PREVIEW AUDIO -->

                         <div class="panel panel-default">
                        <div class="panel-heading"><center><h4>Format Audio</h4></center></div>
                        <div class="panel-body">
                        <p>Présentation</p>
                        <center><audio controls src='../files/<?php echo $presentation_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Comment le prendre ?</p>
                        <center><audio controls src='../files/<?php echo $utilisation_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Surdosage et Omission</p>
                        <center><audio controls src='../files/<?php echo $trouble_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Contre-indications et grossesse</p>
                        <center><audio controls src='../files/<?php echo $contreindication_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Interactions</p>
                        <center><audio controls src='../files/<?php echo $interaction_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Effets indésirables</p>
                        <center><audio controls src='../files/<?php echo $effets_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        <br>
                        <p>Recommandations</p>
                        <center><audio controls src='../files/<?php echo $recommandation_audio ?>'style=" max-width:50% ; max-height=50% "></center>
                        </div>
                        </div>

                        <!-- PANEL PREVIEW TEXTE -->

                        <div class="panel panel-default">
                        <div class="panel-heading"><center><h4>Format Texte Simplifié</h4></center></div>
                        <div class="panel-body">
                        <p>Présentation</p>
                        <hr>
                        <p><?php echo $presentation_textesimp ?></p>
                        <br>
                        <p>Comment le prendre ?</p>
                        <hr>
                        <p><?php echo $utilisation_textesimp ?></p>
                        <br>
                        <p>Surdosage et Omission</p>
                        <hr>
                        <p><?php echo $trouble_textesimp ?></p>
                        <br>
                        <p>Contre-indications et grossesse</p>
                        <hr>
                        <p><?php echo $contreindication_textesimp ?></p>
                        <hr>
                        <br>
                        <p>Interactions</p>
                        <hr>
                        <p><?php echo $interaction_textesimp ?></p>
                        <br>
                        <p>Effets indésirables</p>
                        <hr>
                        <p><?php echo $effets_textesimp?></p>
                        <br>
                        <p>Recommandations</p>
                        <hr>
                        <p><?php echo $recommandation_textesimp ?></p>
                        </div>
                        </div>

            </div>
            <div class="col-md-3"></div>

      </div>
  </div>
      <?php
 }

 else {

	if ($_SESSION['rang'] == 1) {

            header("location: welcome.php");      
      
      } else if ($_SESSION['rang'] == 2) {
      
            header("location: welcomea.php");
      
      } else if ($_SESSION['rang'] == 3) {
      
            header("location: welcomesa.php");
      }
 }

?>