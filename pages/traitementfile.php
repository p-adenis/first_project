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


<div class="container-fluid">
      <div class="row">
            <div class="col-md-3">
            <?php $lien = $_POST['lien'] ?>
                  <a href="<?php echo $lien ?>"> <button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search"></span>&nbsp Notice ANSM</button></a>
            </div>
            <div class="col-md-6">
<?php
//Input nom et image

    if (isset($_POST['preview'])){

        $nom = $_POST['nom'];
        $image_name = $_FILES['image']['name'];
        $tmp_name_image = $_FILES['image']['tmp_name'];

        echo "<center><h4>$nom </h4></center>";
        move_uploaded_file($tmp_name_image, '../files/' . $image_name);
        
        
        ?>
        <center><img src="<?php echo '../files/' . $image_name  ?>" style=" max-width:50% ; max-height=50% "></center>
        <br>
        <?php

    if (isset($_FILES['video_array'])) {
    $name_video = $_FILES['video_array']['name'];
    $tmp_name_video = $_FILES['video_array']['tmp_name'];
    $type_video = $_FILES['video_array']['type'];
    $size_video = $_FILES['video_array']['size'];
    $error_video = $_FILES['video_array']['error'];


        for ($i = 0; $i < count($tmp_name_video); $i++) {
        move_uploaded_file($tmp_name_video[$i], "../files/" . $name_video[$i]);
            echo "<center><video controls src='../files/$name_video[$i]' style= 'max-width:50% ; max-height=50%'></center>";
        }
    }

    if (isset($_FILES['audio_array'])) {
        $name_audio = $_FILES['audio_array']['name'];
        $tmp_name_audio = $_FILES['audio_array']['tmp_name'];
        $type_audio = $_FILES['audio_array']['type'];
        $size_audio = $_FILES['audio_array']['size'];
        $error_audio = $_FILES['audio_array']['error'];
    
    
        for ($i = 0; $i < count($tmp_name_audio); $i++) {
            move_uploaded_file($tmp_name_audio[$i], "../files/" . $name_audio[$i]);
            echo "<center><audio controls src='../files/$name_audio[$i]'></center>";
        }
    }
    
    if (isset($_POST['text_array'])){
        $text = $_POST['text_array'];
        echo $text[0] . $text[1] . $text[2] . $text[3] . $text[4] . $text[5] . $text[6];
    } 
}
?>
</div>
<div class="col-md-3"><a href="javascript:history.go(-1)">Retour</a></div>
</div>
</div>
<?php

    if (isset($_POST['creer'])){
  
if (!empty($nom) || !empty($_FILES['image'] || !empty($lien))) {

    $nom = $_POST['nom'];
    $lien = $_POST['lien'];
    $user_cree = $_SESSION['username'];
    $image_name = $_FILES['image']['name'];
    $tmp_name_image = $_FILES['image']['tmp_name'];
    

    $fields = array($nom);

    $url = "http://localhost/tests/notices/" .
            http_build_query($fields);

    include('../phpqrcode/qrlib.php');

            $folder = "../imagesqrcode/";
            $file_name = $nom . ".png";
            $file_name = $folder . $file_name;
            QRcode::png($url, $file_name);

    if (move_uploaded_file($tmp_name_image, '../files/' . $image_name)) {
        $req1 = "INSERT INTO notices_info (notice_image, nom_notice, url_notice, url_ansm, user_cree, user_modife, user_archive, user_valide) VALUES ('$image_name','$nom', '$url','$lien', '$user_cree', '0', '0', '0') ";
        $res1 = $link->query($req1) or die('Erreur SQL ! <br/>' . $req1 . '<br/>' . $link->error);
        $id = mysqli_insert_id($link);
        $req11 = "INSERT INTO liste (id_info) VALUES ('$id') ";
        $res11 = $link->query($req11) or die('Erreur SQL ! <br/>' . $req11 . '<br/>' . $link->error);

    }


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
    $req2 = "INSERT INTO format_video (presentation_video, utilisation_video, trouble_video, contreindication_video, interaction_video, effets_video, recommandation_video) VALUES ('$name_video[0]', '$name_video[1]', '$name_video[2]', '$name_video[3]', '$name_video[4]', '$name_video[5]', '$name_video[6]')";
    $res2 = $link->query($req2) or die('Erreur SQL ! <br/>' . $req2 . '<br/>' . $link->error);
    $id2 = mysqli_insert_id($link);
    $req22 = "UPDATE liste SET id_video = '$id2' WHERE id_info = '$id'";
    $res22 = $link->query($req22) or die('Erreur SQL ! <br/>' . $req22 . '<br/>' . $link->error); 
    
}

    //Input audio

if (isset($_FILES['audio_array'])) {
    $name_audio = $_FILES['audio_array']['name'];
    $tmp_name_audio = $_FILES['audio_array']['tmp_name'];
    $type_audio = $_FILES['audio_array']['type'];
    $size_audio = $_FILES['audio_array']['size'];
    $error_audio = $_FILES['audio_array']['error'];


    for ($i = 0; $i < count($tmp_name_audio); $i++) {
        move_uploaded_file($tmp_name_audio[$i], "../files/" . $name_audio[$i]);

    }

    $req3 = "INSERT INTO format_audio (presentation_audio, utilisation_audio, trouble_audio, contreindication_audio, interaction_audio, effets_audio, recommandation_audio) VALUES ('$name_audio[0]', '$name_audio[1]', '$name_audio[2]', '$name_audio[3]', '$name_audio[4]', '$name_audio[5]', '$name_audio[6]')";
    $res3 = $link->query($req3) or die('Erreur SQL ! <br/>' . $req3 . '<br/>' . $link->error);
    $id3 = mysqli_insert_id($link);
    $req33 = "UPDATE liste SET id_audio = '$id3' WHERE id_info = '$id'";
    $res33 = $link->query($req33) or die('Erreur SQL ! <br/>' . $req33 . '<br/>' . $link->error); 
   

}

if (isset($_POST['text_array'])){
    $text = $_POST['text_array'];

        $req4 = "INSERT INTO format_textesimp (presentation_textesimp, utilisation_textesimp, trouble_textesimp, contreindication_textesimp, interaction_textesimp, effets_textesimp, recommandation_textesimp) VALUES ('$text[0]', '$text[1]', '$text[2]', '$text[3]', '$text[4]', '$text[5]', '$text[6]')";
        $res4 = $link->query($req4) or die('Erreur SQL ! <br/>' . $req4 . '<br/>' . $link->error);
        $id4 = mysqli_insert_id($link);
        $req44 = "UPDATE liste SET id_textsimp = '$id4' WHERE id_info = '$id'";
        $res44 = $link->query($req44) or die('Erreur SQL ! <br/>' . $req44 . '<br/>' . $link->error); 
}
?>
<script type="text/javascript">

        window.location = "creernotices.php"; 
    </script>
<?php


} 
?>  