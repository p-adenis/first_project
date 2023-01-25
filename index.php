        <?php //Ce fichier est utilisé pour le formulaire de login
        include("assets/header.php");

        ?>
        <?php

        $username = $password = $rang ="";
        $username_err = $password_err = "";


        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty(trim($_POST["username"]))){
                $username_err = "Le champ nom d'utilisateur est vide.";
            } else{
                $username = trim($_POST["username"]);
            }
            
            if(empty(trim($_POST['password']))){
                $password_err = 'Le champ mot de passe est vide.';
            } else{
                $password = trim($_POST['password']);
            }
            
            if(empty($username_err) && empty($password_err)){
                $param_password = sha1($password);

                $stmt = $link->prepare("SELECT * FROM `users` WHERE `username`= ? AND `password`= ?");
                $stmt->bind_param('ss', $username, $param_password);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_array();


                session_start();
                $_SESSION['username'] = $row['username']; 
                $_SESSION['rang'] = $row['rang']; 

                if ($_SESSION['rang'] == 1) {

                    header("location: pages/welcome.php");

                } else if ($_SESSION['rang'] == 2) {

                    header("location: pages/welcomea.php");  
                }
                else if ($_SESSION['rang'] == 3) {

                    header("location: pages/welcomesa.php");  

                } else{
                    
                    $username_err = 'Identifiant/mot de passe invalide.';
                }

                mysqli_stmt_close($stmt);
            }
            
            mysqli_close($link);
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title> Connexion </title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
            
        </head>
        <style>
            body {
                margin-top: 200px;
            }
        </style>
        <body>
            <div class="container-fluid">
            <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="container-fluid">
                <h2>Connexion</h2>
                <p>Merci de rentrer vos données pour vous connecter.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Nom d'utilisateur</label>
                        <input type="text" name="username"class="form-control" value="<?php $username = "aa"; echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <a href="passwordreset/forgot_password.php">Mot de passe oublié ?</a>
                        <center>
                        <input type="submit" class="btn btn-success" value="Se connecter">
                        </center>
                    </div>
                    
                </form>
                </div>
                </div> 
                <div class="col-md-4"></div>
                
            </div>
        </div>

        </body>
        </html>