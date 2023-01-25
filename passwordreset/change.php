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
}
catch(PDOException $ex) 
    { 
        $msg = "Failed to connect to the database"; 
    } 

// Was the form submitted?
if (isset($_POST["ForgotPassword"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["adressem"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["adressem"];
		
	}else{
		echo "email is not valid";
		exit;
	}

	// Check to see if a user exists with this e-mail
	$query = $conn->prepare('SELECT adressem FROM users WHERE adressem = :adressem');
	$query->bindParam(':adressem', $email);
	$query->execute();
	$userExists = $query->fetch(PDO::FETCH_ASSOC);
	$conn = null;
	
	if ($userExists["adressem"])
	{
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

		// Create the unique user password reset key
		$password = hash('sha1', $salt.$userExists["adressem"]);

		// Create a url which we will direct them to reset their password
		$pwrurl = "http://localhost/tests/passwordreset/reset_password.php?q=".$password;
		
		// Mail them their key
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: noticesbot <noticesbot@gmail.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

		$mailbody = "Cher utilisateur,\n\nSi ce mail ne vous est pas adressé,merci de l'ignorer. Il apparaît que vous avez demandé un nouveau mot de passe pour le site www.urapeda-notices.com\n\nPour changer de mot de passe, merci de cliquer sur le lien suivant. Si vous ne pouvez pas cliquer sur le lien, vous pouvez le copier et le rentrer sur votre navigateur\n\n" . $pwrurl . "\n\nMerci,\nLe service URAPEDA.";
		mail($userExists["adressem"], "localhost - Password Reset", $mailbody, $headers);

         ?>
         <script>
			alert("Votre clé de réinitialisation de mot de passe a été envoyée sur votre adresse mail.");
			
		</script>

	   <?php
		
	}

	else
		{		
			?>

         <script>
			alert("Votre clé de réinitialisation de mot de passe a été envoyée sur votre adresse mail.");

		</script>
	
<?php		
		
	   
}
}
?>            