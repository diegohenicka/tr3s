<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/dateresult.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="sidemenu/sidemenu.css">
</head>
<body>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div class="date__result">
    <?php if (!empty($myevents_['id'])) { ?> 
    <?php do { ?>
        <div class="result__item">
            <div class="result__item__header"></div>
            <div class="result__item__data">
                <div class="item__photo">
                    <img src="./photos/<?php echo $myavatar; ?>" alt="">
                </div>
                
                <div class="item__info">
                    <?php echo $username; ?>, <?php echo $myage; ?> anos<br>
                    <span class="city">
                    <?php echo $myevents_['city']; ?>, <?php echo $myevents_['state']; ?>
                    </span>
                </div>

                <div class="item__description">
                <?php echo $myevents_['date_desc']; ?>
                </div>
                <div class="item__actions">
                    <div class="actions__icons">
                        <img src="img/<?php echo $myevents_['gender']; ?>.png" alt="">
                        <img src="img/types/<?php echo $myevents_['type']; ?>.png" alt="">
                        <img src="img/hour.png" alt="Horários livres:<?php echo $date_info_results['date_start']; ?> - <?php echo $date_info_results['date_end']; ?>">
                    </div>
                    <a href="dateinfos.php?dateid=<?php echo $myevents_['id']; ?>">
                    <button class="btn">Ver Info</button>
                    </a>
                </div>
            </div>
        </div>
    <?php } while($myevents_ = $result1->fetch_assoc()); ?>
    <?php } ?>
            </div>
    </div>
    <script src="./jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
</body>
</html>