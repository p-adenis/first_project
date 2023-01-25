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


<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">


			<form action="" method="post">

				<div class="panel panel-default">
					<div class="panel-heading"><center><h4>Supprimer une notice</h4></center></div>
					<div class="panel-body" style="min-height: 740px;">
						<label>Quelle(s) notice(s) souhaitez vous supprimer ? : </label>
						

<br>
<br>
					<ul class="list-group">
<?php

//Requête SQL : Sélection des notices 
$req4 = "SELECT id, nom_notice FROM notices_info ";
$res4 = mysqli_query($link, $req4) or die('ERREUR SQL ! <br/>' . $req4 . '<br/>' . mysqli_error());

//Importation notices en liste

while ($notices = mysqli_fetch_array($res4)) {

        extract($notices);
		
		
        echo "<li class='list-group-item'>
        <div class='checkbox'>
        <label><input type='checkbox' value='$id' name='check_list[]'>$nom_notice</label>
        </div>
        </li>";
}
if (mysqli_num_rows($res4)==0){
	?>
	<center><i>Aucune notice à supprimer</i></center>
	<?php
}
?>
</ul>
<center>

	<button type='submit' class='btn btn-danger  btn-lg ' value=''>
		<span class='glyphicon glyphicon-trash'></span>
	</button>
</center>
<?php 

	if (isset($_POST['check_list'])){



		$number = count($_POST['check_list']);
		for ($i =0; $i<$number; $i++) {
			
			$rowdel = $_POST['check_list'][$i];


		$sql ="DELETE FROM notices_info WHERE id = '$rowdel' ";
		$res = mysqli_query($link, $sql) or die ('ERREUR SQL ! <br/>' . $sql . '<br/>' . mysqli_error());

		$sql1 ="DELETE FROM format_video WHERE id = '$rowdel' ";
		$res1 = mysqli_query($link, $sql1) or die ('ERREUR SQL ! <br/>' . $sql1 . '<br/>' . mysqli_error());

		$sql2 ="DELETE FROM format_audio WHERE id = '$rowdel' ";
		$res2 = mysqli_query($link, $sql2) or die ('ERREUR SQL ! <br/>' . $sql2 . '<br/>' . mysqli_error());

		$sql3 ="DELETE FROM format_textesimp WHERE id = '$rowdel' ";
		$res3 = mysqli_query($link, $sql3) or die ('ERREUR SQL ! <br/>' . $sql3 . '<br/>' . mysqli_error());
		
		$sql4 ="DELETE FROM liste WHERE id = '$rowdel' ";
		$res4 = mysqli_query($link, $sql4) or die ('ERREUR SQL ! <br/>' . $sql4 . '<br/>' . mysqli_error());
		?>

		
		<script type="text/javascript">

        window.location = "supprimernotices.php"; 
		   
		</script>
		<?php
	}
	}

?>


</div>
</div>
</form>


</div>
<div class="col-md-3"></div>
</div>
</div>

