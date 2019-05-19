<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php require_once('api/infos_check.php'); ?>
<?php $hashwallet = md5($userid); ?>
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
        <div class="title">Comprar Créditos:</div>

        <div class="data">
            <img src="img/coin-big.png" alt="" class="coin">
            <div class="value">
                100 Créditos por R$3 (Promoção de lançamento)
            </div>
    
            <div class="description">
                Com 100 créditos você pode marcar até 5 encontros
            </div>
        </div>
        <form id="wps-bn" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            
            <input type="hidden" name="quantity" id="quantity"  value="1" />
            <!--Tipo do botão-->
            <input type="hidden" name="cmd" value="_xclick" />

            <!--Vendedor e URL de retorno, cancelamento e notificação-->
            <input type="hidden" name="business" value="admin@appdeeper.com" />
            <input type="hidden" name="return" value="https://meseparei.com.br/add/add_credits.php" />
            <input type="hidden" name="rm" value="2" />
            <input type="hidden" name="cancel" value="https://meseparei.com.br/comprar.php?msg=Você não tem créditos sufucientes, adquira seu pacote aqui" />

            <!--Internacionalização e localização da página de pagamento-->
            <input type="hidden" name="charset" value="utf-8" />
            <input type="hidden" name="lc" value="BR" />
            <input type="hidden" name="country_code" value="BR" />
            <input type="hidden" name="currency_code" value="BRL" />

            <!--Informações sobre o produto e seu valor-->
            
            <input type="hidden" name="amount" value="3" />
            <input type="hidden" name="item_name" value="Servico" />
            <input type="hidden" name="custom" value="<?php echo $hashwallet; ?>" />
            <input type="hidden" name="rm" value="2" />


             
           <!--Botão para submissão do formulário-->
            <button class="btn" id="wps-bn" onclick="submitForm()" title="wps-bn">Comprar via Paypal</button>
       </form>
    </div>

    <script src="comprar.js"></script>
</body>
</html>