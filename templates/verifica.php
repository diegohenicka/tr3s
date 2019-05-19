<?php //require_once('api/db.php'); ?>
<?php
//MySQLi connection
//$conn = mysqli_connect("localhost","root","senha123","mesepare_teste");
//$con = $conn;
$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'pass');

// Check connection for any errors
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

//our included config file
//include "config.php";
//starting our session to preserve our login
session_start();
//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
	//redirecting if there is already a session with the name username
	header("Location: index.php");
}
//check whether data with the name username has been submitted
if (isset($_POST['username'])) {
	//variables to hold our submitted data with post
	$username = $_POST['username'];
	$pass = md5($_POST['password']);
	//our sql statement that we will execute
	$sql = "SELECT * FROM user WHERE user='$username' AND pass='$pass'";
	//Executing the sql query with the connection
	$re = mysqli_query($con, $sql);
	//check to see if there is any record / row in the database
	//if there is then the user exists
	if (mysqli_num_rows($re)) {
		//echo "Welcome";
		//creating a session name with username ad inserting the submitted username
		$_SESSION['username'] = $username;
		//redirecting to homepage
		header("Location: index.php");
	}else{
		//display error if no record exists
		echo("<script language='javascript'>alert('Usuário ou senha incorretas');parent.window.location.href='index.php'</script>");
	}
}
?>