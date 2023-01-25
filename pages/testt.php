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

<form action="" method="post">

<input type="submit" name="valide" value = " Valider ">

<?php 

if (isset($_POST['valide']){

$dossier_traite = "../files";
 
$repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.
 
while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
{
$chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.
 
// Si le fichier n'est pas un répertoire…
if ($fichier != ".." AND $fichier != "." AND !is_dir($fichier))
       {
       unlink($chemin); // On efface.
       }
}
closedir($repertoire); // Ne pas oublier de fermer le dossier ***EN DEHORS de la boucle*** ! Ce qui évitera à PHP beaucoup de calculs et des problèmes liés à l'ouverture du dossier.

})

?>



</form>