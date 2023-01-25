 <?php //ce fichier est utilisé pour le formulaire de login
        include("../assets/header.php");

        ?>
<?php

// Connect to MySQL
    $username = "root"; 
    $password = ""; 
    $host = "localhost"; 
    $dbname = "notices"; 
try {
$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
//$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch(PDOException $ex) 
    { 
        $msg = "Failed to connect to the database"; 
    } 
    
// Was the form submitted?
if (isset($_POST["ResetPasswordForm"]))
{
	// Gather the post data
	$email = $_POST["adressem"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	$hash = $_POST["q"];

	// Use the same salt from the forgot_password.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

	// Generate the reset key
	$resetkey = hash('sha1', $salt.$email);

	// Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{
			//has and secure the password
			$password = sha1($password);

			// Update the user's password
				$query = $conn->prepare('UPDATE users SET password = :password WHERE adressem = :adressem');
				$query->bindParam(':password', $password);
				$query->bindParam(':adressem', $email);
				$query->execute();
				$conn = null;

				
			
			?>
			<script>
			alert("Your password has been successfully reset.");
		</script>
		
			<?php
		}
		else
			echo "Your password's do not match.";
	}
	else
		echo "Your password reset key is invalid.";
}

?>
