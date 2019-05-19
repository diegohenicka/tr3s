<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');


	$gender = $_POST['gender'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$place = $_POST['place'];
	//QUE TIPO DE ENCONTRO
	$array2 = $_POST['activities'];
	$actv1 = $array2['0'];
	//DESCRIÇÕES
	$array1 = $_POST['comments'];
   $desc1 = $array1['0'];
   $desc2 = $array1['1'];
	//DATAS
	$array3 = $_POST['date'];
   $data1 = $array3['0'];
   $data2 = $array3['1'];
	//HORA
	$array4 = $_POST['time'];
   $time1 = $array4['0'];
   $time2 = $array4['1'];
	//CONTACT
//$contact1 = $_POST['contact'];
//$contact1 = $array5['0'];



	$today = date("Y-m-d");

	//$sqlverifica = "SELECT * from user where email = '$email' or user = '$user' ";
	//$result = $conn->query($sqlverifica);
	//$team = $result->fetch_assoc();
	
	//if ($result->num_rows == 0) {

	$sql = "INSERT INTO dates (creator_id, creator_gender, gender, type, state, city, place, date_start, date_end, hour_start, hour_end, creator_desc, date_desc)
	VALUES ('$userid', '$usergender', '$gender', '$actv1', '$state', '$city', '$place', '$data1', '$data2', '$time1', '$time2', '$desc1', '$desc2')";

	if ($conn->query($sql) === TRUE) {
		echo("<script language='javascript'>parent.window.location.href='index.php?msg=Faça seu login' </script>");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
//} else {
	//echo("<script language='javascript'>parent.window.location.href='index.php?erro=Email ou usuario já cadastrado' </script>");}
			
	
	
	$conn->close();
?>
