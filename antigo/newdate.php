<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<?php require_once('api/infos_check.php'); ?>
<?php require_once('api/check_wallet.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/newdate.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="./picker/classic.css">
    <link rel="stylesheet" href="./picker/classic.date.css">
    <link rel="stylesheet" href="./picker/classic.time.css">
    <link rel="stylesheet" href="./picker/timepicker.css">

    <link rel="stylesheet" href="sidemenu/sidemenu.css">
</head>
<body>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div id="newdate-slider">
        <div class="newdate__slide first__step">
            <div class="slide__content">
                <div class="newdate__title">
                    Buscar encontro com:
                </div>
                <div class="select__gender">
                    <div id="man" class="gender">
                        <img src="./img/man.png" alt="">
                        <span class="gender__label">
                            Homem
                        </span>
                    </div>
                    
                    <div id="woman" class="gender">
                        <img src="./img/woman.png"  alt="">
                        <span class="gender__label">
                            Mulher
                        </span>
                    </div>

                    <div id="both" class="gender">
                        <img src="./img/both.png" alt="">
                        <span class="gender__label">
                            Ambos
                        </span>
                    </div>
                </div>
                <button disabled id="first__slide_btn" onclick="nextSlide()" class="btn">Continuar</button>
            </div>
        </div>

        <div class="newdate__slide second__step">
                <div class="slide__content">
                    <div class="newdate__title">
                        Que tipo:
                    </div>
                    <div class="select__category">
                        <div data-code="1" class="category__item">
                            <img src="img/dinner.png" alt="">
                            Comer e Beber
                        </div>
                        <div data-code="2" class="category__item">
                            <img src="img/popcorn.png" alt="">
                            Cinema
                        </div>
                        <div data-code="3" class="category__item">
                            <img src="img/park.png" alt="">
                            Parque
                        </div>
                        <div data-code="4" class="category__item">
                            <img src="img/running.png" alt="">
                            Esportes
                        </div>
                        <div data-code="5" class="category__item">
                            <img src="img/travel.png" alt="">
                            Viajar
                        </div>
                        <div data-code="6" class="category__item">
                            <img src="img/party.png" alt="">
                            Dançar/Festa
                        </div>
                    </div>
                    <button disabled id="second__slide_btn" onclick="nextSlide()" class="btn">Continuar</button>
                </div>
        </div>

        <div class="newdate__slide third__step">
            <div class="slide__content">
                <div class="newdate__title">
                    Onde:
                </div>
                <div class="newdate__place__select">
                    <select class="newdate__select" onchange="selectedPlace()" name="state" id="estados">
    
                    </select>
                    <select class="newdate__select" onchange="selectedPlace()" name="city" id="cidades">
                        <option selected disabled value=""><?php echo $usercity; ?></option>
                    </select>

                    <!-- <select class="newdate__select" onchange="selectedPlace()" name="city" id="places">
                        <option selected disabled value="">Escolha um lugar</option>

                        <option value="madero">Madero</option>
                        <option value="cinema">Cinema</option>
                    </select> -->
                </div>
                <button disabled id="third__slide_btn" onclick="nextSlide()" class="btn">Continuar</button>

            </div>
        </div>

        <div class="newdate__slide fourth__step">
            <div class="slide__content">
                <div class="newdate__top">
                    <div class="newdate__title">
                        Estou disponível
                    </div>
                    <div class="newdate__subtitle">
                        Selecione as datas que você está disponivel
                    </div>
                </div>
                <div class="newdate__datepicker">
                    <input type="text" id="datepicker">
                </div>
                <button disabled id="fourth__slide_btn" onclick="nextSlide()" class="btn">Continuar</button>
            </div>
        </div>
        <div class="newdate__slide fifth__step">
            <div class="slide__content">
                <div class="newdate__top">
                    <div class="newdate__title">
                        Estou disponível
                    </div>
                    <div class="newdate__subtitle">
                        Selecione os horários que você está disponivel
                    </div>
                </div>
                <div class="newdate__timepicker">
                    <input class="timepicker" onchange="selectTime()" placeholder="Selecione o horário" type="text" id="timepicker-from">
                    <div class="till">até</div>
                    <input class="timepicker" onchange="selectTime()" placeholder="Selecione o horário" type="text" id="timepicker-to">
                </div>
                <button  disabled id="fifth__slide_btn" onclick="nextSlide()" class="btn">Continuar</button>
            </div>
        </div>
        <div class="newdate__slide sixth__step">
            <div class="slide__content">
                <div class="newdate__top">
                    <div class="newdate__title">
                        Detalhes:
                    </div>
                </div>
                <div class="newdate__textarea__group">
                    <textarea class="newdate__textarea" onkeypress="changeText()"  placeholder="Conte um pouco sobre você, e o que espera desse encontro..." name="" id="first-text" required ></textarea>
                    <textarea class="newdate__textarea" onkeypress="changeText()"  placeholder="O que busca na pessoa ideal para esse encontro..." name="" id="second-text" required></textarea>
                </div>
                <button disabled id="sixth__slide_btn" onclick="finish()" class="btn">Finalizar</button>
            </div>
        </div>
        <div class="newdate__slide last__step">
            <div class="slide__content">
                <img src="img/confirmed.png" alt="" class="newdate__confirmed">
                <div class="newdate__top">
                    <div class="newdate__title">
                        Evento criado com sucesso!
                    </div>
                </div>
                <button onclick="mydates()" class="btn">Meus Eventos</button>
            </div>
        </div>
    </div>
    <script src="./jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./picker/shadow.js"></script>
    <script src="./picker/picker.js"></script>
    <script src="./picker/picker.date.js"></script>
    <script>
$(document).ready(function () {
		

        var items = [];
        var options = '<option value="<?php echo $userstate; ?>"><?php echo $userstate; ?></option>';	

        $.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });					
        $("#estados").html(options);				
        
        $("#estados").change(function () {				
        
            var options_cidades = '';
            var str = "";					
            
            $("#estados option:selected").each(function () {
                str += $(this).text();
            });
            
            $.each(data, function (key, val) {
                if(val.nome == str) {							
                    $.each(val.cidades, function (key_city, val_city) {
                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                    });							
                }
            });

            let ph = '<option selected value="<?php echo $usercity; ?>"><?php echo $usercity; ?></option>';
            $("#cidades").html(ph+options_cidades);
            
        }).change();		
    

});
    </script>

    <script src="./picker/timepicker.js"></script>
    <script src="newdate.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
    <script src="select.js"></script>
</body>
</html>