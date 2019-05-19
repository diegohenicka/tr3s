<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php
$buttom="Tenho Interesse 😏";
$buttom_link="add/iwant.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/dateinfos.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <script src="./jquery.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
    <link rel="stylesheet" href="sidemenu/sidemenu.css">


</head>
<body>
<body>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div class="profile__cover">
    </div>

    <div class="profile__content">
        <div class="profile__data">
            <div class="profile__cover__mobile">

                <div class="profile__photo">
                    <img src="./photos/<?php echo $useravatar_date['name']; ?>" alt="">
                </div>
                
                <div class="profile__info">
                <?php echo $userdateinfo['user']; ?>, <?php echo $userdateinfo['age']; ?> anos<br>
                    <span class="city">
                    <?php echo $date_info['city']; ?>, <?php echo $date_info['state']; ?>
                    </span>
                </div>
            </div>
            <form action="<?php echo $buttom_link; ?>" method="post">
            <input type="hidden" id="" name="dateid" value="<?php echo $date_info['id']; ?>">
            <input type="hidden" id="" name="creator_id" value="<?php echo $date_info_creator_id; ?>">
            <button tyoe="submit" id="follow" class="btn">
                <?php echo $buttom; ?>
            </button>
            </form>
            <div class="profile__text">
            <h4>Um pouco de mim</h4><br>
            <?php echo $date_info_creator; ?>
            </div>
        </div>
        <div class="profile__images">
        <div class="date__text">
            <h4>O encontro perfeito</h4><br>
            <?php echo $date_info_desc; ?>
        </div>
        <?php if (!empty($useralbum_date['name'])) { ?>
        <?php do { ?>
            <img src="./photos/album/<?php echo $useralbum_date['name']; ?>" alt="">
        <?php } while($useralbum_date = $result7->fetch_assoc()); ?>
        <?php } ?>
        </div>
        <div class="profile__text__mobile">
            <h4>Um pouco de mim</h4><br>
        <?php echo $date_info_creator; ?><br>
        <h4>O encontro perfeito</h4><br>
        <?php echo $date_info_desc; ?>
        </div>
    </div>
    <script src="profile.js"></script>
</body>
</html>