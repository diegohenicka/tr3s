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
    <?php if (!empty($date_info_results['date_desc'])) { ?> 
    <?php do { ?>
        <?php 
        //
        $date_search_creator_id = $date_info_results['creator_id'];
        //busca de infos dos usuarios para repeat
        @$y1 = "select * from user where id ='$date_search_creator_id' ";
        $z1 = $conn->query($y1);
        $x1 = $z1->fetch_assoc();

        //busca de avatar dos usuarios para repeat
        @$y2 = "select * from photos where userid ='$date_search_creator_id' ORDER BY `id` DESC ";
        $z2 = $conn->query($y2);
        $x2 = $z2->fetch_assoc();  

        ?>
        <div class="result__item">
            <div class="result__item__header"></div>
            <div class="result__item__data">
                <div class="item__photo">
                    <img src="./photos/<?php echo $x2['name']; ?>" alt="">
                </div>
                
                <div class="item__info">
                <?php echo $x1['user']; ?>, <?php echo $x1['age']; ?> anos<br>
                    <span class="city">
                    <?php echo $date_info_results['city']; ?>, <?php echo $date_info_results['state']; ?>
                    </span>
                </div>

                <div class="item__description">
                <?php echo $date_info_results['date_desc']; ?>
                </div>
                <div class="item__actions">
                    <div class="actions__icons">
                        <img src="img/<?php echo $date_info_results['gender']; ?>.png" alt="">
                        <img src="img/types/<?php echo $date_info_results['type']; ?>.png" alt="">
                        <img src="img/hour.png" alt="Horários livres:<?php echo $date_info_results['date_start']; ?> - <?php echo $date_info_results['date_end']; ?>">
                    </div>
                    <a href="dateinfos.php?dateid=<?php echo $date_info_results['id']; ?>">
                    <button class="btn">Ver Info</button>
                    </a>
                </div>
            </div>
        </div>
    <?php } while($date_info_results = $result8->fetch_assoc()); ?>
    <?php } ?>
            </div>
    </div>
    <script src="./jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
</body>
</html>