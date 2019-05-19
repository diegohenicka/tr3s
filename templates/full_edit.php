<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');


	$city = $_POST['city'];
    @$state = $_POST['state'];
    @$descr = $_POST['descr'];
    @$contact_whats = $_POST['contact'];

	//$gender = $_POST['gender'];

	$today = date("Y-m-d");


  $sql = "UPDATE user SET city='$city', state='$state', descr='$descr', contact='$contact_whats' WHERE id=$userid";

	if ($conn->query($sql) === TRUE) {
        echo("<script language='javascript'>parent.window.location.href='index.php' </script>");

    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	$conn->close();
?>
