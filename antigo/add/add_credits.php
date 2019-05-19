<?php require_once('../api/db.php'); ?>
<?php require_once('../api/login_check.php'); ?>
<?php require_once('../api/api.php'); ?>
<?php
	date_default_timezone_set('America/Sao_Paulo');

    $userbuy = $_POST['custom'];

    $today = date("Y-m-d");
    $newcredits = 100;
    $mycreditbuy= $mycredits + $newcredits;
 if (!empty($userbuy)) {

    $sql = "UPDATE wallet SET credits='$mycreditbuy' WHERE userid=$userid";

if ($conn->query($sql) === TRUE) {

    echo ("<script language='javascript'>parent.window.location.href='../comprasucesso.php' </script>");

} else {

    echo ("<script language='javascript'>parent.window.location.href='../comprar.php' </script>");

}
 }
 else {
    echo "Error: ";
 }
	$conn->close();
?>
