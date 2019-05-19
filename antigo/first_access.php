<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/first.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="./picker/classic.css">
    <link rel="stylesheet" href="./picker/classic.date.css">
    <link rel="stylesheet" href="./picker/classic.time.css">
    <link rel="stylesheet" href="./picker/timepicker.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="sidemenu/sidemenu.css">
</head>
<body>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div id="newdate-slider">
        <div class="newdate__slide first__step">
            <div class="slide__content">
            <h3 class="newdate__title">Finalize seu cadastro :)</h3>
            <form action="full_cadastro.php" id="" class=""  method="post" enctype="multipart/form-data">
                <div class="newdate__place__select">
                    <select class="newdate__select" name="state" id="estados" required>
    
                    </select>
                    <select class="newdate__select" name="city" id="cidades" required>
                        <option selected disabled value="">Escolha sua cidade</option>
                    </select>
                </div>
                <div class="newdate__textarea__group">
                    <textarea class="newdate__textarea" placeholder="Conte um pouco sobre você, o que você gosta de fazer..." name="descr" id="" required ></textarea>
                    <input class="newdate__textfield" onkeypress="changeText()"   placeholder="Seu whatsapp" type="text" name="contact" id="" required>
                </div>
                <div class="newdate__textarea__group">
                Selecione sua imagem de perfil:
                    <input class="" type="file" name="fileToUpload" id="fileToUpload" required>
               </div>
               <input  class="btn" type="submit" value="Enviar" name="submit"> 
            </form>
            </div>
        </div>
    </div>
    <script src="./jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="./picker/shadow.js"></script>
    <script src="./picker/picker.js"></script>
    <script src="./picker/picker.date.js"></script>
    <script>
$(document).ready(function () {
		

        var items = [];
        var options = '<option value="<?php echo $userstate; ?>">Selecione seu estado</option>';	

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

            let ph = '<option selected value="<?php echo $usercity; ?>">Selecione sua cidade</option>';
            $("#cidades").html(ph+options_cidades);
            
        }).change();		
    

});
    </script>
    <script>
        jQuery("input.newdate__textfield")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
    </script>
    <script>
    function validate(){

if($('#fileToUpload')[0].files.length === 0){
    alert("Selecione sua foto de perfil");
    $('#fileToUpload').focus();

    return false;
}
}
var a = document.getElementById("cidades").required;
var b = document.getElementById("estados").required;
    </script>

    
    <script src="./picker/timepicker.js"></script>
<!--<script src="newdate.js"></script> -->
    <script src="sidemenu/sidemenu.js"></script>
    <script src="select.js"></script>
</body>
</html>