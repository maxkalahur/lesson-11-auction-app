function getTimeRemaining(endtime){
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

function initializeClock(el){
    var clock = el;
    console.log(clock.attr('data-end'));
    var timeinterval = setInterval(function(){
        var t = getTimeRemaining( clock.data('end') );
        clock.html( '' + t.days + ' d ' +
            ' '+ t.hours + ' h ' +
            ' ' + t.minutes + ' m ' +
            ' ' + t.seconds + ' s ' );
        if(t.total<=0){
            clearInterval(timeinterval);
        }
    },1000);
}

$(document).ready(function() {

    var t = Date.parse('2016-01-30 08:00:00') - Date.parse(new Date());
    var seconds = Math.floor( (t/1000) % 60 );
    var minutes = Math.floor( (t/1000/60) % 60 );
    var hours = Math.floor( (t/(1000*60*60)) % 24 );
    var days = Math.floor( t/(1000*60*60*24) );
    console.log( {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    } );


    $('.timer').each(function(el) {
        initializeClock( $(this) );
    });

});