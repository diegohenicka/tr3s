<?php require_once('../api/db.php'); ?>
<?php require_once('../api/login_check.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');


	$status_date_id = $_POST['dateid'];


	//$gender = $_POST['gender'];

	$today = date("Y-m-d");

    if ($_POST['action'] = "accept") {

        $sql = "UPDATE notifications SET status='1' WHERE id=$status_date_id";

        if ($conn->query($sql) === TRUE) {
    
            echo("<script language='javascript'>window.history.back();	</script>");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {

        $sql = "UPDATE notifications SET status='3' WHERE id=$status_date_id";

        if ($conn->query($sql) === TRUE) {
            echo("<script language='javascript'>window.history.back();	</script>");
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }



	
	$conn->close();
?>
