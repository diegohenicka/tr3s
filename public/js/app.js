

$(document).ready(function(){
    $( "#login-form" ).submit(function( event ) {
        event.preventDefault();
        let data = $('#login-form').serialize();
        let url = $('#login-form').attr('action');
        
        debugger;
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(msg){
                alert( msg );
                location.reload();
            },
            
        });
    });
    $( "#cadastro-form" ).submit(function( event ) {
        event.preventDefault();
        let data = $('#cadastro-form').serialize();
        let url = $('#cadastro-form').attr('action');
        data+= "&gender="+$('.gender.active')[0].id
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(msg){
                alert( msg );
                location.reload();
            },
        });
    });


    $('#cis').on("click", function() {                
        $('#cis').addClass('active');
        $('#trans').removeClass('active');
    })
    $('#trans').on("click", function() {
        $('#trans').addClass('active');
        $('#cis').removeClass('active');
    })

    $('#login').on("click", function() {
        $('#login-modal').css('display', 'flex');
    })
    $('#close-login-modal').on("click", function() {
        $('#login-modal').css('display', 'none');
    })

    $('#cadastro').on("click", function() {
        $('#cadastro-modal').css('display', 'flex');
    })
    $('#close-cadastro-modal').on("click", function() {
        $('#cadastro-modal').css('display', 'none');
    })

    $('#how-it-works').on("click", function() {
        $('#how-it-works-modal').css('display', 'flex');
        $('#onboard').slick();
    })
    $('#close-how-it-works-modal').on("click", function() {
        $('#how-it-works-modal').css('display', 'none');
    })
    

})