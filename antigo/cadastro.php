<?php require_once('api/db.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');


	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];


	$today = date("Y-m-d");

	$sqlverifica = "SELECT * from user where email = '$email' or user = '$user' ";
	$result = $conn->query($sqlverifica);
	$team = $result->fetch_assoc();
	
	if ($result->num_rows == 0) {

	$sql = "INSERT INTO user (user, pass, email, gender, age)
	VALUES ('$user', '$pass', '$email', '$gender', '$age')";

	if ($conn->query($sql) === TRUE) {
		echo("Usuário cadastrado com Sucesso :)");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	echo("Email e/ou usuário já cadastrado");}
			
	
	
	$conn->close();
?>
