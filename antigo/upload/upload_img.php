<?php require_once('../api/db.php'); ?>
<?php require_once('../api/login_check.php'); ?>
<?php require_once('../api/api.php'); ?>
<?php
//$img_file = $_FILES["fileToUpload"]["name"];
$img_file = $_FILES["fileToUpload"]["name"];
$target_dir = "images/";
$target_file = $target_dir . basename($img_file);
$file_ext = substr($img_file, strripos($img_file, '.')); // This returns file ext
$newfilename = mt_rand().round(microtime(true)) . $file_ext;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//echo "Sorry, file already exists.";
  //  $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {
    if 
    (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
        
        $sql = "INSERT INTO photos (userid, name)
        VALUES ('$userid', '$newfilename')";

        if ($conn->query($sql) === TRUE) {
            echo("<script language='javascript'>parent.window.location.href='../profile.php' </script>");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>