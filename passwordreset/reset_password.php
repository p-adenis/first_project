 <?php //ce fichier est utilisé pour le formulaire de login
        include("../assets/header.php");

        ?>


 <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title> password reset </title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
            
        </head>
        <style>
            body {
                margin-top: 200px;
            }
        </style>
        <body>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="container-fluid">
                <h2>Récupération</h2>
                <p>Merci de rentrer votre adresse email et un nouveau mot de passe</p>
                <?php echo '
                <form action="reset.php" method="post">
                    <div class="form-group">
                        <label>Adresse mail</label>
                        <input type="text" name="adressem" class="form-control"><br />
                         <label>Nouveau mot de passe</label>
                        <input type="password" name="password" class="form-control" />
                         <label>Retaper mot de passe</label>
                        <input type="password" name="confirmpassword" class="form-control" /><br />
                       <input type="hidden" name="q" value="';
if (isset($_GET["q"])) {
	echo $_GET["q"];
}
	echo '" /><input type="submit" name="ResetPasswordForm" value=" Valider nouveau mot de passe " />
</form>';

?>

                       
                    </div>    
                    
                    
                </form>
                </div>
                </div> 
                <div class="col-md-4"></div>
                </div> 
            </div>

        </body>
        </html>