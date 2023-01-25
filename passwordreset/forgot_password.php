  <?php //ce fichier est utilisé pour le formulaire de login
        include("../assets/header.php");

        ?>
        


 <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title> forgotpassword </title>
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
                <p>Merci de rentrer votre adresse email pour générer un nouveau mot de passe</p>
                <form action="change.php" method="post">
                    <div class="form-group">
                        <label>Adresse mail</label>
                </form>
                        <input type="text" name="adressem" class="form-control">
                       </br>
                        <input type="submit" name="ForgotPassword" class="form-control" value="Envoyer">
                       
                    </div>    
                    
                    
                </div>
                </div> 
                <div class="col-md-4"></div>
                </div> 
            </div>

        </body>
        </html>
        