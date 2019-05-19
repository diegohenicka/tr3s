<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php
//INFO CONTACT DATE
$int_contact= $notifications['int_id'];
$creator_contact= $notifications['creator_id'];

//@$d_contact = "select * from user WHERE id ='$int_contact' ";
//$x1 = $conn->query($d_contact);
//$y1 = $x1->fetch_assoc();

//@$d_contact2 = "select * from user WHERE id ='$creator_contact' ";
//$x2 = $conn->query($d_contact2);
//$y2 = $x2->fetch_assoc();
//$showcontact2= $y2['contact'];

$buttom="Comprar Créditos";
$buttom_link="comprar.php";
    if ($notifications['creator_id'] == $userid and $notifications['int_id'] == $info_profile and $notifications['status'] == 1)  
        {$buttom= $date_profile_contact;
        $buttom_link="";}
    if ($notifications['creator_id'] == $info_profile and $notifications['int_id'] == $userid and $notifications['status'] == 1)  
        {$buttom= $date_profile_contact;
        $buttom_link="";}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <script src="./jquery.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="sidemenu/sidemenu.css">
    <link rel="stylesheet" href="css/imagemodal.css">


</head>
<body>
<body>
    <div class="modal__out" id="image-modal">
        <div class="modal__box">
            <div class="modal__close" id="close-image-modal">
                <img src="./img/close.png" alt="">
            </div>
            <img src="./img/profile-cover.jpg" alt="" id="modal-img" class="modal__image">
            
        </div>
    </div>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div class="profile__cover">
    </div>

    <div class="profile__content">
        <div class="profile__data">
            <div class="profile__cover__mobile">

                <div class="profile__photo">
                    <img src="./photos/<?php echo $myavatar2; ?>" alt="">
                </div>
                
                <div class="profile__info">
                <?php echo $date_profile_name; ?>, <?php echo $date_profile_age; ?> anos<br>
                    <span class="city">
                    <?php echo $date_profile_city; ?>, <?php echo $date_profile_state; ?>
                    </span>
                </div>
            </div>

            <a href="<?php echo $buttom_link; ?>"><button id="follow" class="btn">
            <?php echo $buttom; ?>
            </button></a>

            <div class="profile__text">
            <?php echo $date_profile_desc; ?>
            </div>
        </div>
        <div class="profile__images">
        <?php if (!empty($useralbum2['name'])) { ?>
        <?php do { ?>
            <img class="profile__image__item" src="./photos/album/<?php echo $useralbum2['name']; ?>" alt="">
        <?php } while($useralbum2 = $result12->fetch_assoc()); ?>
        <?php }?>
        </div>
        <div class="profile__text__mobile">
        <?php echo $date_profile_desc; ?>
        </div>
    </div>
    <div id="searchdate">
        <a href="newdate.php"><img src="img/new_.png" alt=""></a>
    </div>
    <div id="newdate">
        <a href="finddate.php"><img src="img/search_.png" alt=""></a>
    </div>

    <script src="profile.js"></script>
</body>
</html>