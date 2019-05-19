<?php
    if( isset($_GET['code']))  {

        $code = $_GET['code'];
    }
    else {
        $code = 0;
    }
    include 'contents.php';

    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/slick.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <script src="./jquery.min.js"></script>
    <?php include 'tags.php'; ?>
<!-- Google Tag Manager -->
    <!-- JIVOSITE CODE -->
    <script type='text/javascript'>
    (function(){ var widget_id = 'LY7xyqvXLX';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
    </script>
<!-- {/literal} END JIVOSITE CODE -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZZWXLM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="modal__out" id="login-modal">
        <div class="modal__box">
            <div class="modal__close" id="close-login-modal">
                <img src="./img/close.png" alt="">
            </div>
            <img src="./img/heart.png" alt="" class="modal__icon">
            <div class="modal__title">
                Vamos Começar
            </div>
            <div class="modal__subtitle">
                Ao clicar em entrar você concorda com os Termos. <br> Política de Privacidade e Política de Cookies
            </div>
            <form method="POST" action="verifica.php" class="modal__form">
                <input name="username" type="text" placeholder="Usuário" class="modal__input">
                <input name="password" type="password" placeholder="Senha" class="modal__input">
                <input class="modal__submit" type="submit" value="Entrar">
            </form>
        </div>
    </div>
    <div class="modal__out" id="how-it-works-modal">
        <div class="modal__box">
            <div class="modal__close" id="close-how-it-works-modal">
                <img src="./img/close.png" alt="">
            </div>
            
            <div id="onboard" class="slides">
                <div class="onboard__slide">
                    <img src="./img/onboarding/1.jpg" alt="">
                </div>
                <div class="onboard__slide">
                    <img src="./img/onboarding/2.jpg" alt="">
                </div>
                <div class="onboard__slide">
                    <img src="./img/onboarding/3.jpg" alt="">
                </div>
                <div class="onboard__slide">
                    <img src="./img/onboarding/4.jpg" alt="">
                </div>
                <div class="onboard__slide">
                    <img src="./img/onboarding/5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal__out" id="cadastro-modal">
        <div class="modal__box">
            <div class="modal__wrapper">
            <div class="modal__close" id="close-cadastro-modal">
                <img src="./img/close.png" alt="">
            </div>
            <img src="./img/heart.png" alt="" class="modal__icon">
            <div class="modal__title">
                Vamos Começar
            </div>
            <div class="modal__subtitle">
                Ao clicar em entrar você concorda com os Termos. <br> Política de Privacidade e Política de Cookies
            </div>
            <form action="cadastro.php" id="cadastro-form" class="modal__form">
                <input name="user" type="text" placeholder="Usuário" class="modal__input">
                <input name="email" type="email" placeholder="Email" class="modal__input">
                <input name="age" type="number" placeholder="Idade" class="modal__input">

                <input name="pass" type="password" placeholder="Senha" class="modal__input">

                <div class="select__gender">
                    <span class="gender__title">
                        Sou:
                    </span>
                    <div id="woman" class="gender">
                        <img src="./img/woman.png"  height="80" width="80" alt="">
                        <span class="gender__label">
                            Mulher
                        </span>
                    </div>

                    <div id="man" class="gender">
                        <img src="./img/man.png" height="80" width="80" alt="">
                        <span class="gender__label">
                            Homem
                        </span>
                    </div>
                </div>
                <input class="modal__submit" type="submit" value="Entrar">
            </form>
            </div>
        </div>
    </div>
    <div class="first__section" style="background-image: url(img/<?= $data[$code]->bg1 ?>);">
        <header class="header">
            <img class="logo" src="./img/logo.png" alt="Me Separei">
            <button id="login" class="btn small">
                Login
            </button>
        </header>
        <div class="box">

            <h1 class="title">
            <?= $data[$code]->txt1 ?>
            </h1>
            <h2 class="subtitle">
            <?= $data[$code]->txt3 ?>
            </h2>
        </div>
        <div class="buttons">
            <button id="how-it-works" class="btn">
                Como Funciona
            </button>
            <button id="cadastro" class="btn primary">
                Cadastre-se
            </button>
        </div>
    </div>
    <script src="app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
</body>
</html>