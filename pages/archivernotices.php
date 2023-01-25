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
<?php

if (isset($_POST['archive'])){
    $nom_notice = $_POST['archive'];
    $user_archive = $_SESSION['username'];

    $sql9 = "UPDATE notices_info SET rang_notice=4 , user_archive='$user_archive'  WHERE nom_notice='$nom_notice'";
    $res9 = mysqli_query($link, $sql9) or die ('ERREUR SQL ! <br/>' . $sql9 . '<br/>' . mysqli_error());

    echo "<div class='alert alert-warning' role='alert'>
                <strong>Notification : </strong> La notice <strong>\" $nom_notice \"</strong> a été archivée !
          </div>";
}

?>
	
<div class="col-md-3"></div>
		<div class="col-md-6">
            <!-- DEBUT PANNEL -->
			<div class="panel panel-default">
				<div class="panel-heading"><center><h4>Notices à archiver </h4></center></div>
					<div class="panel-body" style="min-height: 740px;">
                        <label> Quelle notice souhaitez-vous archiver ? : </label>
                            <br>
                            <br>
                        <form method="post" action="">     
                        <?php

                        $req4 = "SELECT nom_notice FROM notices_info WHERE rang_notice= 2 ";
                        $res4 = mysqli_query($link, $req4) or die('ERREUR SQL ! <br/>' . $req4 . '<br/>' . mysqli_error());


                        while ($notices = mysqli_fetch_array($res4)) {

                            extract($notices);

                            ?>
                                    <li class='list-group-item'><div  style='margin-top: 0.8em'> <?php echo $nom_notice ?> </div>
                                        <div align='right' style='margin-top: -2em'>
                                            <button type='submit' class='btn btn-warning' value='<?php echo $nom_notice ?>' name='archive'>
                                            <span class='glyphicon glyphicon-folder-open'></span>
                                        </button>
                                        </div>
                                    </li>
                       <?php 
                                                         
                                             }

                                             if (mysqli_num_rows($res4)==0){
                                                ?>
                                                <center><i>La liste des notices à archiver est <strong> vide </strong></i></center>
                                                <?php
                                            }
                                        
                                        ?>
                        

                        
                            <br>
                        </form>
					</div>
			</div>
			<!-- FIN PANNEL -->
		</div>
        <div class="col-md-3"></div>


</div>
</div>

