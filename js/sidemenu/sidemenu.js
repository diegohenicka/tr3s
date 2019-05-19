

$(document).ready(function(){
    $('#hamburguer').on('click', function() {
        $('#sidemenu').toggleClass('opened');
    })
    $('#close-menu').on('click', function() {
        $('#sidemenu').removeClass('opened');
    })
})
function logout() {
    parent.window.location.href='logout.php';
}