//==============================
$(document).ready(function(){

});
//==============================
$(window).on("scroll", function() {
    if ($(window).scrollTop() > 20) $('.menu').addClass('fixed');
    else $('.menu').removeClass('fixed');
});

function toggleNavi() {
	event.currentTarget.classList.toggle('toggle');
	var menu = document.querySelector('.menu ul.navi');
	menu.classList.toggle('active');
	var body = document.querySelector('body');
	body.classList.toggle('overflow-hidden');
}

function dataSRC(element) {
	var parent = event.currentTarget.parentNode;
	var iframe = document.createElement('iframe');
	iframe.setAttribute('src', element);
	iframe.setAttribute('allowfullscreen', '');
	iframe.setAttribute('frameborder', '0');
	parent.append(iframe);
}

function toggleREGform(element) {
	if (element == 'open') {$('.content .start-content .form').slideDown(300);}
	if (element == 'close') {$('.content .start-content .form').slideUp(300);}
}

function get_timer_274(string_274) {
    var date_new_274 = string_274; 
    var date_t_274 = new Date(date_new_274);
    var data_1 = new Date();
    var newDate = new Date();
    newDate.setMilliseconds(2 * 60 * 60 * 1000);  // +2 часа UTC
    var data_2 = ""+Math.round(newDate.getUTCMonth()+1)+"/"+newDate.getUTCDate()+"/"+newDate.getUTCFullYear()+" "+newDate.getUTCHours()+":"+newDate.getUTCMinutes()+":"+newDate.getUTCSeconds()+"";
    var date_274 = new Date(data_2);
    var timer_274 = date_t_274 - date_274;
    if(date_t_274 > date_274) {
        var day_274 = parseInt(timer_274/(60*60*1000*24));
        if(day_274 < 10) {
            day_274 = "0" + day_274;
        }
        day_274 = day_274.toString();
        var hour_274 = parseInt(timer_274/(60*60*1000))%24;
        if(hour_274 < 10) {
            hour_274 = "0" + hour_274;
        }
        hour_274 = hour_274.toString();
        var min_274 = parseInt(timer_274/(1000*60))%60;
        if(min_274 < 10) {
            min_274 = "0" + min_274;
        }
        min_274 = min_274.toString();
        var sec_274 = parseInt(timer_274/1000)%60;
        if(sec_274 < 10) {
            sec_274 = "0" + sec_274;
        }
        sec_274 = sec_274.toString(); 
        timethis_274 = day_274 + " : " + hour_274 + " : " + min_274 + " : " + sec_274;
        // $(".timerhello_274 p.result .result-day").text(day_274);
        $(".timerhello_274 p.result .result-hour").text(hour_274);
        $(".timerhello_274 p.result .result-minute").text(min_274);
        $(".timerhello_274 p.result .result-second").text(sec_274);
    } else {
        // $(".timerhello_274 p.result .result-day").text("00");
        $(".timerhello_274 p.result .result-hour").text("00");
        $(".timerhello_274 p.result .result-minute").text("00");
        $(".timerhello_274 p.result .result-second").text("00");
    } 
}

function getfrominputs_274(){
    //
    var dataDay = $('.timerhello_274 .result').attr('data-day');
    var dataMonth = $('.timerhello_274 .result').attr('data-month');
    var dataYear = $('.timerhello_274 .result').attr('data-year');
    var dataHour = $('.timerhello_274 .result').attr('data-hour');
    //
    string_274 = "1/1/2100 00:00"; //месяц/день/год часы ===================================
    //
    get_timer_274(string_274);
    setInterval(function(){
        get_timer_274(string_274);
    },1000);
}

$(document).ready(function(){ getfrominputs_274();});


$('body').ready(function() {
    $('[data-payment-method]').on('change', function() {
        $('[data-gamepoint-code-wrapper]').toggleClass('hidden', $(this).children('option:selected').val() !== 'gamepoints');
    });

    $('[data-clipboard-text]').attr('data-clipboard-text', $('[data-text-copy]').text());
    var clipboard = new ClipboardJS('[data-copy]');
    clipboard.on('success', function(e) {
        $('[data-copy-success]').fadeIn(1000).delay(1000).fadeOut(1000);
    });
});