currentstep = 0;

var genderInterest = '';
var activities = 0;
var userEstado = '';
var userCidade = '';



function nextSlide() {
    $('#newdate-slider').slick('next');
    currentstep += 1;
}
function prevSlide() {
    if (currentstep == 0) {
        window.location.href = './'
    }
    else {
        $('#newdate-slider').slick('prev');
        currentstep -= 1;
    }
}
function selectedPlace(ev) {
    if (
        $('#estados')[0].value != "" &&
        $('#cidades')[0].value != "" 
    ) {
        $('#third__slide_btn').prop("disabled", false);

    }
}
function finish() {
    userEstado = $('#estados')[0].value
    userCidade = $('#cidades')[0].value

    let obj = {
        gender: genderInterest,
        activities: activities,
        state: userEstado,
        city: userCidade,
    }

    //debugger;
    
    $.ajax({
        type: "GET",
        url: '',
        data: obj,
        success: (success => {
            parent.window.location.href="date_results.php?a1=" + userEstado + "&a2=" + userCidade + "&a3=" + genderInterest + "&a4=" + activities;
        }),
        error: (error => {
            debugger;
        })
    });
}





$(document).ready(function(){
    $('#man').on("click", function() {
        genderInterest = 'man';
        $('#first__slide_btn').prop("disabled", false);
        $('#man').addClass('active');
        $('#woman').removeClass('active');
        $('#both').removeClass('active');
    })
    $('#woman').on("click", function() {
        genderInterest = 'woman';
        $('#first__slide_btn').prop("disabled", false);
        $('#woman').addClass('active');        
        $('#man').removeClass('active');
        $('#both').removeClass('active');
    })
    $('#both').on("click", function() {
        genderInterest = 'both';
        $('#first__slide_btn').prop("disabled", false);
        $('#both').addClass('active');
        $('#woman').removeClass('active');
        $('#man').removeClass('active');
    })


    $('.category__item').on("click", function(ev) {
        $('#second__slide_btn').prop("disabled", false);

        let code = parseInt(ev.currentTarget.dataset.code);
        // let indexofitem = activities.indexOf(code);
        // if (indexofitem > -1) {
        //     activities.splice(indexofitem);
        // }
        // else {
        //     activities.push(code)
        // }
        // console.log(activities)
        activities = code;
        $('.category__item.active').removeClass('active');
        $(ev.currentTarget).toggleClass('active')
    })


    setTimeout(() => {
        $('#newdate-slider').slick({
            infinite: false,
            arrows: false,
            swipe: false
        });
        
    }, 100);
    
})
function mydates() {
    parent.window.location.href='mydates.php';
}