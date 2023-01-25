<?php //ce fichier est utilisé pour le formulaire de login
session_start();

    if ($_SESSION['rang'] == 1) {

        header("location: welcome.php");

     
} else if ($_SESSION['rang'] == 2) {

                   include("../assets/headera_co.php");

                } else if ($_SESSION['rang'] == 3) {

                   include("../assets/headersa_co.php");  
                }


// Inclut fichier bdd
require_once 'config.php';

// Définition des variables et initialiation avec des valeurs vides
$username = $password = $adressem = $confirm_password = "";
$username_err = $password_err = $adressem_err = $confirm_password_err = "";

// Vérification de l'envoi du formulaire
if(isset($_POST['valide'])){
 
    // Nom d'utilisateur valide
    if(empty(trim($_POST["username"]))){
        $username_err = "Merci de rentrer un nom";
    } else{
        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
         
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ce nom est déjà pris.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Une erreur est apparue, merci de rééssayer plus tard.";
            }
        }

        
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["adressem"]))){
        $adressem_err = "Merci de rentrer une adresse mail.";
    } 

    else if (!filter_var($_POST["adressem"], FILTER_VALIDATE_EMAIL)) {
        $adressem_err = "Format d'adresse invalide.";
        
        
            }

else{
        
    $sql = "SELECT id FROM users WHERE adressem = ?";

    if($stmt = mysqli_prepare($link, $sql)){
            
        mysqli_stmt_bind_param($stmt, "s", $param_adressem);

          
        $param_adressem = trim($_POST["adressem"]);

        if(mysqli_stmt_execute($stmt)){

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $adressem_err = "Cette adresse mail est déjà utilisée.";
            } else{
                $adressem = trim($_POST["adressem"]);
            }
        } else{
            echo "Oops! Une erreur est apparue, merci de rééssayer plus tard.";
        }
    }

    mysqli_stmt_close($stmt);
}



    // Mot de passe valide
if(empty(trim($_POST['password']))){
    $password_err = "Merci de rentrer un mot de passe.";     
} elseif(strlen(trim($_POST['password'])) < 6){
    $password_err = "Le mot de passe doit avoir 6 caractères minimum.";
} else{
    $password = trim($_POST['password']);
}

    // Confirmation mot de passe valide
if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = 'Merci de confirmer le mot de passe.';     
} else{
    $confirm_password = trim($_POST['confirm_password']);
    if($password != $confirm_password){
        $confirm_password_err = 'Les mots de passe ne correspondent pas.';
    }
}
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($adressem_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, adressem, rang) VALUES (?, ?, ?, '1' )"; 
        // ? = évite les injections sql
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_adressem);
            
            // Set parameters
            $param_username = $username;
            $param_password = sha1($password); // Creates a password hash
            $param_adressem = $adressem;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: listeuser.php");
            } else{
                echo "une erreur est apparue, merci de rééssayer plus tard.";
                
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h2>Créer un gestionnaire</h2>
            <p>Merci de remplir ce formulaire pour créér le compte.</p>
        </div>
        <div class="panel-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>  
                <div class="form-group <?php echo (!empty($adressem_err)) ? 'has-error' : ''; ?>">
                    <label>Adresse mail valide</label>
                    <input type="text" name="adressem" class="form-control" value="<?php echo $adressem; ?>">
                    <span class="help-block"><?php echo $adressem_err; ?></span>
                </div>    

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <center><input type="submit" class="btn btn-success" value="Valider" name="valide"></center>
                </div>

            </form>
        </div>
        </div>    
    </div>
</div>
    <div class="col-md-3"></div>
</div>
</div>
</body>
</html>
 