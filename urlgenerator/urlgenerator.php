<?php //ce fichier est utilisé pour le formulaire de login
        include("../assets/header.php");
        include ("../pages/config.php");
        ?>


<?php

$nom_notice = $_POST['nom_notice'];


$fields = array($nom_notice);
 
$url = "http://localhost/tests/notices/" .
        http_build_query($fields);
var_dump($url);


$sql = "INSERT INTO notices_info (nom_notice,url_notice) VALUES ( '$nom_notice','$url')";
$res = $link->query($sql) or die ('Erreur SQL | </br>'. $sql . '</br>' .$link->error);
?>

<?php 
if(isset($_POST['nom_notice']))
{
 include('../phpqrcode/qrlib.php'); 

 $folder="../imagesqrcode/";
 $file_name= $nom_notice.".png";
 $file_name=$folder.$file_name;
 QRcode::png($url,$file_name);
 header("location: ../pages/welcome.php");
 
 //To Display Code Without Storing
 
}
?>
?>