currentstep = 0;

var genderInterest = '';
var activities = 0;
var userEstado = '';
var userCidade = '';
// var userPlace = '';
var dateDate = '';



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
        // $('#places')[0].value != ""
    ) {
        $('#third__slide_btn').prop("disabled", false);

    }
}
function selectTime() {
    if (
        $('#timepicker-from')[0].value != "" &&
        $('#timepicker-to')[0].value != ""
    ) {
        $('#fifth__slide_btn').prop("disabled", false);

    }
}
function changeText() {
    if (
        $('#first-text')[0].value != "" &&
        $('#second-text')[0].value != "" 
    ) {
        $('#sixth__slide_btn').prop("disabled", false);

    }
}

function finish() {
    userEstado = $('#estados')[0].value
    userCidade = $('#cidades')[0].value
    // userPlace = $('#places')[0].value


    dateTime = [$('#timepicker-from')[0].value, $('#timepicker-to')[0].value]
    comments = [$('.newdate__textarea')[0].value, $('.newdate__textarea')[1].value ]
    let obj = {
        gender: genderInterest,
        activities: activities,
        date: dateDate,
        time: dateTime,
        state: userEstado,
        city: userCidade,
        // place: userPlace,
        comments: comments,
    }

    //debugger;
    
    $.ajax({
        type: "POST",
        url: 'date.php',
        data: obj,
        success: (success => {
            nextSlide();
        }),
        error: (error => {
            nextSlide();
        })
    });
}

//jshint asi:true

/**
 * Toggle these comments to change the demo..
 */

var options = {
    opened: 'always',
    allowRange: true,
    format: 'd-mm-yyyy',
//   formatRange: 'From { to }.',
//   formatMultiple: '{, |, and finally, }.',
//   firstDay: 1,
//   show: 'months',
    min: new Date(),
//   max: new Date(2014, 11, 8),
}
var pickadate = shadow.Pickadate.create({
    $el: $('#datepicker'),
    attrs: options
})
  
  // Update the stats when the attributes are set.
var eventNames = [
    'set:highlight.stats',
    'set:select.stats',
    'set:value.stats'
].join(' ')
pickadate.on(eventNames, function(event) {
    updateStats(event.name, event.value)
})
  
  // Set the starting stats.
  updateStats('highlight', pickadate.attrs.highlight)
  updateStats('select', pickadate.attrs.select)
  updateStats('value', pickadate.attrs.value)
  
  function updateStats(name, value) {
    stringvalue = JSON.stringify(value)

    
    if (name == "select" && value) {
        dateDate = value.map(x => x.value.join('-'))
        if (dateDate.length>1) {
            $('#fourth__slide_btn').prop("disabled", false);
        }
        else {
            $('#fourth__slide_btn').prop("disabled", true);
        }
    }
    $('#' + name).text(stringvalue)
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
    $('#timepicker-from').timepicker({
        timeFormat: 'H:i'
     });
     $('#timepicker-to').timepicker({
   timeFormat: 'H:i'
   });

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