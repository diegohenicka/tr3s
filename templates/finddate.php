<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maria</title>
    <link rel="stylesheet" href="css/newdate.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="js/picker/classic.css">
    <link rel="stylesheet" href="js/picker/classic.date.css">
    <link rel="stylesheet" href="js/picker/classic.time.css">
    <link rel="stylesheet" href="js/picker/timepicker.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="sidemenu/sidemenu.css">
</head>
<body>
<?php include 'menulat.phtml'; ?>
<?php include 'header.phtml'; ?>
    <div id="newdate-slider">
        <div class="newdate__slide second__step">
                <div class="slide__content">
                    <div class="newdate__title">
                        Selecione a modalidade de transporte:
                        </div>
<!--                    <div class="select__category" style=" max-width: 257px;">-->
                    <div class="select__category">
<!--                        <div data-code="1" class="category__item" style="width: 21%;">-->
                        <div data-code="1" class="category__item">
                            <a href="/uber/-30,0588/-51,1664/price"><img src="img/bus-side-view (2).png" alt=""></a>
                        </div>
<!--                        <div data-code="2" class="category__item" style="width: 21%;">-->
                        <div data-code="2" class="category__item">
                            <a href="/uber/-30,0588/-51,1664/price"><img src="img/bicycle (1).png" alt=""></a>
                        </div>
<!--                    </div>-->
<!--                    <div class="select__category" style="max-width: 257px;">-->
<!--                        <div data-code="3" class="category__item" style="width: 21%;">-->
                        <div data-code="3" class="category__item">
                            <a href="/uber/-30,0588/-51,1664/price"><img src="img/car (2).png" alt=""></a>
                        </div>
<!--                        <div data-code="4" class="category__item" style="width: 21%;">-->
                        <div data-code="4" class="category__item">
                            <a href="/uber/-30,0588/-51,1664/price"><img src="img/boat@2x.png" alt=""></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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

    <script src="js/finddate.js"></script>
    <script src="js/sidemenu/sidemenu.js"></script>
    <script src="js/select.js"></script>
</body>
</html>