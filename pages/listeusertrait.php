<?php //ce fichier est utilisé pour le formulaire de login
session_start();

if ($_SESSION['rang'] == 3) {

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
<?php 

if (isset($_POST['delete'])){

    $delete_user = $_POST['delete'];

    $sql2= " DELETE FROM users WHERE username = '$delete_user' ";
    $result = mysqli_query($link, $sql2);

?>
    
    <script type="text/javascript">

        window.location = "listeuser.php"; 
    </script>

    <?php 
$username = $_POST['delete'];

echo "
<div class='alert alert-info'>
  <strong>Notification : </strong> L'utilisateur \"<strong>$username</strong>\" a été supprimé !
</div>";

}

if (isset($_POST['modify'])){

    $username = $_POST['modify'];

    $sql1 = "SELECT * FROM users WHERE username = '$username'";
    $req1 = mysqli_query($link, $sql1);

    while ($user = mysqli_fetch_array($req1)) {
              
        extract($user);
    }
?>
<?php 
        
?>

<form action="listeuser.php" method="post">
<div class="container-fluid">

    <div class="col-md-2"><a href="javascript:history.go(-1)"><button class="btn btn-default btn-lg" style="background : white"><span class="glyphicon glyphicon-arrow-left"></span></button></a></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><center> Modification de : <strong><?php echo $username ?></strong> </center></h4></div>
                <div class="panel-body"> 
                    <label>Nom d'utilisateur </label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                        <br>
                    <label>Adresse mail </label>
                        <input type="text" class="form-control" name="mail" value="<?php echo $adressem ?>">
                        <br>
                    <label>Rang </label>
                        
                            <?php 
                                if ($rang == 1 || $rang == 2){

                                    switch ($rang){

                                        case 1:
                            
                                            $rang = "gestionnaire";
                                            $rangautre = "administrateur";
                                            $value_rang = 1;
                                            $value_rangautre = 2;
                            
                                        break; 
                            
                                        case 2: 
                            
                                            $rang = "administrateur";
                                            $rangautre = "gestionnaire";
                                            $value_rang = 2;
                                            $value_rangautre = 1;
                                        
                                        break;
                                    }
                                    
                            ?>
                            <select class="form-control" name="rang">
                            <option value="<?php echo $value_rang ?>" selected="selected"><?php echo $rang ?></option>
                            <option value="<?php echo $value_rangautre ?>"><?php echo $rangautre ?></option>
                               
                               <?php

                                }

                                ?>
                            <?php 

                             if ($rang == 3) {
                            
                            echo "<input type='text' class='form-control' value ='Superadministrateur' disabled> ";
                            
                            }
                            ?>
                        </select>
                        <br>
                    <label>Date de création </label>
                        <?php
                            $separe = explode (" ", $created_at);
                            $create = "Créer le ".$separe[0];
                            $a = " à " . $separe[1];
                            ?>
                        <input type="text" value="<?php echo $create, $a?>" class="form-control" disabled>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <center><input type="submit" value="Modifier" class="btn btn-primary" name="modif"></center>
                </div>
        </div>
    </div>
    <div class="col-md-2"></div>

</div>
</form>
<?php
}

?>