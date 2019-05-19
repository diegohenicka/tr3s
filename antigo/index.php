<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php require_once('api/infos_check.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <script src="./jquery.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
    <link rel="stylesheet" href="sidemenu/sidemenu.css">
    <link rel="stylesheet" href="css/imagemodal.css">
    <?php include 'tags.php'; ?>
</head>
<body>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZZWXLM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
                    <img src="./photos/<?php echo $myavatar; ?>" alt="">
                </div>
                
                <div class="profile__info">
                <?php echo $username; ?>, <?php echo $myage; ?> anos<br>
                    <span class="city">
                    <?php echo $usercity; ?>, <?php echo $userstate; ?>
                    </span>
                </div>
            </div>

            <a href="comprar.php"><button id="follow" class="btn">
                Comprar Créditos
            </button></a>

            <div class="profile__text">
            <?php echo $userdescr; ?>
            </div>
        </div>
        <form action="add/add_photos.php" id="" class=""  method="post" enctype="multipart/form-data" onchange="submitForm();">
        <div class="profile__images">
        <?php if (!empty($useralbum['name'])) { ?>
        <?php do { ?>
            <img class="profile__image__item" src="./photos/album/<?php echo $useralbum['name']; ?>" alt="">
        <?php } while($useralbum = $result3->fetch_assoc()); ?>
        <?php }?>
            <input style="display: none;" type="file" name="fileToUpload" id="fileToUpload">
            <input style="display: none;" class="" type="submit" value="Enviar" name="submit" id="submit_button_id"> 
            <label class="add_file" for="fileToUpload">
                <img class="" src="./img/plus.png" alt="">
                Adicionar fotos
            </label>
        </div>
        <script type="text/javascript">
        function submitForm() {
        // However you need to submit the form

        document.getElementById("submit_button_id").click(); // Or whatever
        }
</script>
        </form>
        <div class="profile__text__mobile">
        <?php echo $userdescr; ?>
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