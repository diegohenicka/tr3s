<?php require_once('../api/db.php'); ?>
<?php require_once('../api/login_check.php'); ?>
<?php require_once('../api/api.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');

    $today = date("Y-m-d");
    $dateid = $_POST['dateid'];
    $creator_id = $_POST['creator_id'];



	$sqlverifica = "SELECT * from notifications where (int_id = '$userid' or creator_id = '$userid') and date_id = '$dateid' ";
	$result = $conn->query($sqlverifica);
	$team = $result->fetch_assoc();
	
	if ($result->num_rows == 0) {

	$sql = "INSERT INTO notifications (date_id, creator_id, int_id)
	VALUES ('$dateid', '$creator_id', '$userid')";

	if ($conn->query($sql) === TRUE) {
		echo("<script language='javascript'>window.history.back();	</script>");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	echo("<script language='javascript'>window.history.back();</script>");}
			
	
	
	$conn->close();
?>
