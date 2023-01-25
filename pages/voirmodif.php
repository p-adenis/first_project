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

    if (isset($_POST['modif'])){

            $idtexte = $_POST ['idtexte'];
            $idvideo = $_POST ['idvideo'];
            $idaudio = $_POST ['idtexte'];
            $idinfo = $_POST ['idinfo'];
            $idliste = $_POST ['idliste'];



                $nom = $_POST['nom'];
                $lien = $_POST['lien'];
                $user_modif = $_SESSION['username'];
                $image_name = $_FILES['image']['name'];
                $tmp_name_image = $_FILES['image']['tmp_name'];
                
            //INFOS NOTICE : Si nom ou lien modifié 

                $req1 = " UPDATE notices_info SET nom_notice = '$nom', url_ansm = '$lien',   user_modife = '$user_modif' WHERE id = '$idinfo' ";
                $res1 = $link->query($req1) or die('Erreur SQL ! <br/>' . $req1 . '<br/>' . $link->error);
            
            //INFOS NOTICE : Si image modifié

                if (move_uploaded_file($tmp_name_image, '../files/' . $image_name)) {
                    $req2 = " UPDATE notices_info SET notice_image = '$image_name', user_modife = '$user_modif' WHERE id = '$idinfo' ";
                    $res2 = $link->query($req2) or die('Erreur SQL ! <br/>' . $req1 . '<br/>' . $link->error);
                        echo $req2;
                    
                }
            
            
        
            
                //Input video
            
            if (isset($_FILES['video_array'])) {
                $name_video = $_FILES['video_array']['name'];
                $tmp_name_video = $_FILES['video_array']['tmp_name'];
                $type_video = $_FILES['video_array']['type'];
                $size_video = $_FILES['video_array']['size'];
                $error_video = $_FILES['video_array']['error'];
            
            
                for ($i = 0; $i < count($tmp_name_video); $i++) {
                    move_uploaded_file($tmp_name_video[$i], "../files/" . $name_video[$i]);
                }
                $req2 = " UPDATE format_video SET presentation_video = '$name_video[0]', utilisation_video = '$name_video[1]', trouble_video = '$name_video[2]', contreindication_video = '$name_video[3]', interaction_video = '$name_video[4]', effets_video = '$name_video[5]', recommandation_video = '$name_video[6]' WHERE id = '$idvideo'  ";
                $res2 = $link->query($req2) or die('Erreur SQL ! <br/>' . $req2 . '<br/>' . $link->error);
                
                
            }
            
                //Input audio
            
            if (isset($_FILES['audio_array'])) {
                $name_audio = $_FILES['audio_array']['name'];
                $tmp_name_audio = $_FILES['audio_array']['tmp_name'];
                $type_audio = $_FILES['audio_array']['type'];
                $size_audio = $_FILES['audio_array']['size'];
                $error_audio = $_FILES['audio_array']['error'];
            
                         
                        for ($i = 0; $i < count($tmp_name_audio); $i++) {
                            
                            if (move_uploaded_file($tmp_name_audio[$i], "../files/" . $name_audio[$i])){
                               
                                
                                $req3 = "UPDATE format_audio SET presentation_audio = '$name_audio[0]', utilisation_audio = '$name_audio[1]', trouble_audio = '$name_audio[2]', contreindication_audio = '$name_audio[3]', interaction_audio = '$name_audio[4]', effets_audio = '$name_audio[5]', recommandation_audio = '$name_audio[6]' WHERE id = '$idaudio' ";
                                $res3 = $link->query($req3) or die('Erreur SQL ! <br/>' . $req3 . '<br/>' . $link->error);
                                echo $req3; 

                            }

                            } 
                
                    }     

            if (isset($_POST['text_array'])){
                $text = $_POST['text_array'];
            
                    $req4 = "UPDATE format_textesimp SET presentation_textesimp = '$text[0]', utilisation_textesimp = '$text[1]', trouble_textesimp = '$text[2]', contreindication_textesimp = '$text[3]', interaction_textesimp = '$text[4]', effets_textesimp = '$text[5]', recommandation_textesimp = '$text[6]' WHERE id = '$idtexte' ";
                    $res4 = $link->query($req4) or die('Erreur SQL ! <br/>' . $req4 . '<br/>' . $link->error);
                   
            }
    
        }
?>

<div class="container-fluid">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <p><center><h2>Votre notice a été bien été modifiée ! </h2></center></p>
        

    </div>
    <div class="col-md-3"></div>