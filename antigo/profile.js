

$(document).ready(function(){
    $('#follow').on('click', function(ev) {
        parent.window.location.href='comprar.php';    })


    $('.profile__image__item').on("click", function(ev) {
        $('#modal-img')[0].src = (ev.currentTarget.src)
        $('#image-modal').css('display', 'flex');
        $('body').css('overflow', 'hidden');
    })
    $('#close-image-modal').on("click", function() {
        $('#image-modal').css('display', 'none');
        $('body').css('overflow', 'auto');
    })
})