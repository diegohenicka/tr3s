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
    <link rel="stylesheet" href="css/comprar.css">
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
    <div class="buy__credits">

        <img src="img/confirmed.png" alt="" class="check">

        <div class="title">
                Crédito adicionado com sucesso!
        </div>

        <button class="btn">Meu perfil</button>
    </div>

    <script src="comprar.js"></script>
</body>
</html>