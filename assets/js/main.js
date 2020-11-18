// Constants
var carthook_url = "https://konsciousketo.com/a/secure/checkout/4eyT2bsVDPTmKEdAkxdv";
if (base_url().indexOf('simpleketosystem.com/login') > -1) {
    carthook_url = "https://konsciousketo.com/a/secure/checkout/r6sPyfPS7itLSdMQpGze";
} else if (base_url().indexOf('simpleketosystem.com/2m') > -1) {
    carthook_url = "https://konsciousketo.com/a/secure/checkout/voH0885yCCnPFbGxsXtc";
}
//voH0885yCCnPFbGxsXtc should be set in sks/2m
//r6sPyfPS7itLSdMQpGze for sks/login
var form_data_key = 'answers';
var current_step_key = 'current_step';

// Hash Functions
function gotoHash() {
    var destHash = window.location.hash;
    destHash = destHash.substring(1);
    var nextQuizIndex = getQuizIndexFromHash(destHash);

    $('body').removeClass();

    if (nextQuizIndex >= 0) { // quiz area
        $('body').addClass('stepping');

        $('#msform fieldset').hide();
        var strSelector = '#msform fieldset:eq(' + nextQuizIndex + ')';
        $(strSelector).show();

        if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) { // if NOT mobile devices
            adjustQMeasure(nextQuizIndex);
        }
        $('body').addClass(('stepnum' + (nextQuizIndex + 2)));
    } else {
        if (destHash === "processing") { // processing area
            $('body').addClass('processing');
            if ($('.processing-area .button-area').css("visibility") == "hidden") {
                playProcessing();
            }
        }
    }
}

function adjustQMeasure(nextQuizIndex) {
    if (nextQuizIndex == 14 || nextQuizIndex == 15) {
        if ($('.input-term#input-term-1').is(":checked")) {
            $('.q-measure-metric').show();
            $('.q-measure-imperial').hide();
            if (nextQuizIndex == 14) {
                $('.q-measure input#height_cm').focus();
            } else if (nextQuizIndex == 15) {
                $('.q-measure input#curr_weight_kg').focus();
            }
        } else {
            $('.q-measure-metric').hide();
            $('.q-measure-imperial').show();
            if (nextQuizIndex == 14) {
                $('.q-measure input#height_ft').focus();
            } else if (nextQuizIndex == 15) {
                $('.q-measure input#curr_weight_po').focus();
            }
        }
    }
}

window.onhashchange = function () {
    if (window.location.hash != '#undefined') {
        gotoHash();
    } else {
        history.pushState("", document.title, window.location.pathname);
        location.reload();
    }
};

function isNumberic(value) {
    return /^\d+$/.test(value);
}

function getQuizIndexFromHash(hash) {
    var returnVal = -1;
    if (isNumberic(hash) && hash > 0 && hash < 18) {
        returnVal = hash - 2;
    } else if (!hash || hash === '#undefined' || hash.length === 0) {
        returnVal = 0;
    }
    return returnVal;
}


$(document).ready(function () {

    // if quiz page
    if (!($('body').hasClass('email') ||
            $('body').hasClass('summary') ||
            $('body').hasClass('processing') ||
            $('body').hasClass('pricing') ||
            $('body').hasClass('mealplan') ||
            $('body').hasClass('recover'))
            ) {

        var gender = localStorage.getItem("gender");
        $('#gender').val(gender);
        if (gender === "1") {
            $('#msform').removeClass('female-theme').addClass('male-theme');
        }

        gotoHash();


        ///+++ last page retarget test 1
        /*
         if (window.location.href == base_url() || window.location.href == base_url() + "/") {
         var current_step = localStorage.getItem(current_step_key);
         if (current_step) {
         
         if (current_step == "#email") {
         window.location.href = base_url() + '/email';
         } else if (current_step == "#summary") {
         window.location.href = base_url() + '/summary';
         } else if (current_step == "#pricing") {
         window.location.href = base_url() + '/pricing';
         } else {
         if (window.location.href != base_url() + '/' + current_step) {
         window.location.href = base_url() + current_step;
         }
         }
         }
         } else {
         var serialized_value = localStorage.getItem(form_data_key);
         if (serialized_value && serialized_value.length > 0) {
         serialized_value = JSON.parse(serialized_value);
         }
         console.log(serialized_value);
         populateForm();
         }
         */
        // last page retarget test end







    }

    // if processing page 
    if ($('body').hasClass('processing')) {
        $(document).scrollTop(0);
    }
    // if email page
    if ($('body').hasClass('email')) {
        localStorage.setItem(current_step_key, "#email");
        getClientIp();
    }
    // if summary page
    if ($('body').hasClass('summary')) {
        if (window.location.href.indexOf("/plans/") > -1) {
            $('body.summary #whatyouget .text-area .item:nth-child(1) .item-texts .item-text-container span.title').text("A Personalized Keto Meal Plan:");
            $('body.summary #whatyouget .text-area .item:nth-child(1) .item-texts .item-text-container span:nth-child(2)').text("You get a comprehensive Keto Meal Plan designed specifically to fit YOUR body and YOUR health goals.");
            $('body.summary #whatyouget h3').html('<span class="blue-color" style="font-size:1em !important;">YOUR <span class="font-italic">PERSONALIZED</span></span><br /><span class="red-color">KETO MEAL PLAN IS READY!</span>');
        }
        var uid = getQueryString('uid');
        if (uid) {
            $.ajax({
                type: "POST",
                url: base_url() + 'api/getquiz.php',
                data: {'uid': uid},
                dataType: "json",
                success: function (resp) {
                    if (resp['quiz']) {
                        var strQuiz = resp['quiz'];
                        var objQuiz = JSON.parse(strQuiz);
                        startCalculation(false, objQuiz);
                    }
                    var email_data = [{"name": "email", "value": objQuiz['email']}];
                    localStorage.setItem(form_data_key, JSON.stringify(email_data));
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                    alert('Error - ' + errorMessage);
                }
            });
        } else {
            startCalculation();
            localStorage.setItem(current_step_key, "#summary");///+++thinking
        }


    }

    // if pricing page
    if ($('body').hasClass('pricing')) {

        localStorage.setItem(current_step_key, "#pricing");
        var email = getQuizDataFromLocalStorage('email');

        if (!email || email && email.length == 0) {
            var visit = getQueryString('visit');
            if (!(visit && visit == "admin")) {
                window.location.href = base_url();
                alert("To process your custom meal plan please complete the quiz to select your preferences.");
            }
        }
        if (window.location.href.indexOf("/plans/") > -1) {
            carthook_url = "https://konsciousketo.com/a/secure/checkout/bZ4hqshMJYbQVGLS6pwV";

            $('body.pricing .whatyouget h3').text("LIFETIME ACCESS");
            $('body.pricing .whatyouget .one-time-payment').text("To Your Personalized Meal Plan");
            $('body.pricing .whatyouget .lifetime-access.lifetime-access-1').text("Enjoy New Personalized Meal Plans Every Month");
            $('body.pricing .whatyouget .lifetime-access.lifetime-access-2').text("Just Click Below to Get Started!");
            $('body.pricing .whatyouget .old-price').text("$78/mo");
            $('body.pricing .whatyouget .curr-price').text("$39/mo");
            $('body.pricing section.faq .faq-content .panel:nth-child(2) p').text("Once you order today, you get instant access to easy-to-follow meal plans based on your nutritional requirements and goal weight. Each of the meals contained in your personalized Simple Keto System meal plan was designed by a professional chef and overseen by our keto nutritionist.");
            $('body.pricing section.faq .faq-content .panel:nth-child(4) p').text("It's important to understand everyone is different, and their levels of commitment are different as well. That being said, our goal was to make a meal plan is simple enough to get started, and delicious enough to stick with it long term. Each of the meals contains ingredients you’ve personally selected and are designed by our personal chef and nutritionist. We have heard from folks who have lost 2-4 pounds per week using our meal plan. Of course, your results will vary with your metabolism and specific goals. We’re confident once you claim your personalized Simple Keto System meal plan today - and enjoy each of the delicious meals, hitting your goal weight will be fun and enjoyable.");
            $('body.pricing section.faq .faq-content .panel:nth-child(6) p').text("If you begin losing weight faster than you feel comfortable, it’s really easy to adjust and slow the pace of weight loss down. Losing 1-2 pounds per week is a normal and healthy way to reach your weight loss goals. If you are losing weight faster than this, you may choose to only do 5 days on your Simple Keto System meal plan, and 2 days on a regular diet - it’s that simple.");
        }
        if (window.location.href.indexOf("/esc/") > -1) {
            carthook_url = "https://konsciousketo.com/a/secure/checkout/NyrHBP1mmdsvskMSjQdL";
        }
        var carthook_payment_link = carthook_url + "?email=" + encodeURIComponent(email);
        var carthook_payment_link_subscription = "https://konsciousketo.com/a/secure/checkout/bZ4hqshMJYbQVGLS6pwV?email=" + encodeURIComponent(email);
        if (window.location.href.indexOf("/get/") > -1) {
            $('body.pricing .timer-area').hide();
            var html = '<img class="w-100 w-md-60 mx-auto d-block d-sm-none mb-3" src="' + base_url() + 'assets/img/pricing-header-review-all-get.jpg" alt="">';
            html += '<img class="w-100 w-md-75 mx-auto d-none d-sm-block mb-3" src="' + base_url() + 'assets/img/pricing-header-review-all-get-desktop.jpg" alt="">';
            $('body.pricing .success-section .review-list').html(html);
            carthook_payment_link += "&version=get";
        }
        var mar_age = localStorage.getItem('mar_age');
        if (mar_age) {
            carthook_payment_link += '&mar_age=' + mar_age;
            carthook_payment_link_subscription += '&mar_age=' + mar_age;
        }
        $('body.pricing .btn-continue.submit.onetime').attr('href', carthook_payment_link);
        $('body.pricing .btn-continue.submit.subscription').attr('href', carthook_payment_link_subscription);

        var timer2 = "10:01";
        var interval = setInterval(function () {
            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) {
                clearInterval(interval);
            } else {
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                minutes = (minutes < 10) ? '0' + minutes : minutes;

                $('body.pricing .countdown .timer-min').html(minutes);
                $('body.pricing .countdown .timer-sec').html(seconds);

                timer2 = minutes + ':' + seconds;
            }
        }, 1000);
    }

    // mobile keyboard
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) { // if mobile devices

        var _originalSize = $(window).width() + $(window).height();
        $(window).resize(function () {
            if ($(window).width() + $(window).height() !== _originalSize) {//if keyboard is shown
//                alert('keyboard open!');
                if ($('body.stepping').hasClass('stepnum15') || $('body.stepping').hasClass('stepnum16')) {
//                    alert('keyboard open!');
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 0);
                    return false;
                } else if ($('body').hasClass('email')) {
//                    alert('keyboard open!');
                    $('html, body').animate({
                        scrollTop: 150
                    }, 0);
                    return false;
                }
            } else {
//                alert('keyboard close!');
            }
        });
    }


});

function getClientIp() {
    $.getJSON('https://api.ipify.org?format=jsonp&callback=?', function (data) {
        localStorage.setItem("client_ip", data['ip']);
    });
}

//pause Wistia video when other one is played
window._wq = window._wq || [];
window._wq.push({
    id: "_all",
    onReady: function (video) {
        // for all existing and future videos, run this function
        video.bind("play", function () {
            // when one video plays, iterate over all the videos and pause each,
            // unless it's the video that just started playing.
            var allVideos = Wistia.api.all();
            for (var i = 0; i < allVideos.length; i++) {
                if (allVideos[i].hashedId() !== video.hashedId()) {
                    allVideos[i].pause();
                }
            }
        });
    }
});

$(document).on('click', 'body.pricing .btn-continue.submit', function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (base_url().indexOf('simpleketosystem.com/fastspring') > -1) {///+++working
        var email = getQuizDataFromLocalStorage('email');
        $.ajax({
            type: "POST",
            url: base_url() + 'api/check_duplicated_fs.php',
            data: {'email': email},
            dataType: "json",
            success: function (resp) {
                if (resp['duplicated'] == 1) {
                    alert(" You are already enrolled in our program. If you wish to purchase for a family member, please use a different email address.");
                } else {
                    var mySession = {
                        "reset": true,
                        "products": [
                            {
                                "path": "custom-keto-meal-plan-1-month-auto-renew",
                                "quantity": 1
                            }
                        ],
                        "paymentContact": {
                            "email": email,
                        },
                        "language": "en"
                    };
                    //pause videos
                    var allVideos = Wistia.api.all();
                    for (var i = 0; i < allVideos.length; i++) {
                        allVideos[i].pause();

                    }
                    // Push session to fastspring
                    fastspring.builder.push(mySession);
                    fastspring.builder.checkout();
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                alert('Error - ' + errorMessage);
            }
        });
    } else {
        var carthook_payment_link = $(this).attr('href');
        var modal_hidden = $('#order-bump-modal-container').hasClass('hidden');
        if (!modal_hidden) {
            $('#order-bump-modal').modal('show');
        } else {
            if (
                    $('.order-bump-inline #order-bump-checkbox').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox1').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox2').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox3').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox4').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox5').prop('checked') ||
                    $('.order-bump-inline #order-bump-checkbox6').prop('checked')
                    ) {
                var carthook_url = "https://konsciousketo.com/a/secure/checkout/T6PPVi5eitIpHGa3FiSd";
                var email = getQuizDataFromLocalStorage('email');
                carthook_payment_link = carthook_url + "?email=" + encodeURIComponent(email);
            }
            window.open(carthook_payment_link, "_self");
        }
    }
});
$(document).on('click', '#order-bump-modal .ob-body button', function (event) {
    var carthook_payment_link = "";
    if ($(event.target).hasClass("btn-primary")) {
        var carthook_url = "https://konsciousketo.com/a/secure/checkout/T6PPVi5eitIpHGa3FiSd";
        var email = getQuizDataFromLocalStorage('email');
        carthook_payment_link = carthook_url + "?email=" + encodeURIComponent(email);
    } else {
        carthook_payment_link = $("body.pricing .btn-continue.submit").attr('href');
    }
    window.open(carthook_payment_link, "_self");
});

function saveFormToLocalStorage() {
    var answers = {};
    $.map($('#msform').serializeArray(), function (n, i) {
        answers[n['name']] = n['value'];
    });
    var email = getQuizDataFromLocalStorage('email');
    if (email && email.length > 0) {
        answers['email'] = email;
    }
    localStorage.setItem(form_data_key, JSON.stringify(answers));
}

function saveStepsToLocalStorage(stepnum) {
    //var steps = localStorage.getItem('steps');
}

function getQuizDataFromLocalStorage(key) {
    var returnVal = null;
    var obj_answers = JSON.parse(localStorage.getItem(form_data_key));
    if (obj_answers && obj_answers.hasOwnProperty(key)) {
        returnVal = obj_answers[key];
    }
    return returnVal;
}

$("fieldset.single-option input[type='radio']").click(function () {
    $(this).closest("fieldset").find('.next.action-button').click();
});

$("fieldset.q-changes input[type='radio']").change(function () {
    if ($(this).val() === "none") {
        setTimeout(function () {
            $("fieldset.q-changes input[type='radio']").prop('checked', false);
        }, 800);
    }
});


$("fieldset.q-meat input[type='checkbox']").change(function () {
    var name = $(this).attr('name');
    if (name === 'no_meat') {
        if ($(this).is(":checked")) {
            $("fieldset.q-meat input[name!='no_meat']").prop('checked', false);
        }
    } else {
        if ($(this).is(":checked")) {
            $("fieldset.q-meat input[name='no_meat']").prop('checked', false);
        } else {
            var checkednum = $("fieldset.q-meat input[type='checkbox']:checked").length;
            if (checkednum === 0) {
                $("fieldset.q-meat input[name='no_meat']").prop('checked', true);
            }
        }
    }

    var checkedNum = $('fieldset.q-meat').find("input[type='checkbox']:checked").length;
    if (checkedNum > 0) {
        $('fieldset.q-meat .action-button.next').css('display', 'flex');
    } else {
        $('fieldset.q-meat .action-button.next').hide();
    }
});

$("fieldset.q-goals input[type='checkbox']").change(function () {
    var checkedNum = $('fieldset.q-goals').find("input[type='checkbox']:checked").length;
    if (checkedNum > 0) {
        $('fieldset.q-goals .action-button.next').css('display', 'flex');
        var maxHeight = $('fieldset.q-goals').height();
        $('#msform').height(maxHeight);
    } else {
        $('fieldset.q-goals .action-button.next').hide();
    }
});

//$('fieldset.single-option ')
$('.q-radio-measure').change(function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().parent().siblings().find('.q-radio-measure').prop('checked', false);
        $(this).siblings('label').find('input[type=number]:enabled:first').focus();
    }
});
$('.q-measure input[type=number]').focus(function () {
    $(this).parents('.same-ratio-container').find('.q-radio-measure').prop('checked', true);
    $(this).parents('.m-form-checkboxes__item').siblings().find('.q-radio-measure').prop('checked', false);
});


$('.q-measure input[type=number]').on('input', function (e) {

    var targetValue = $(this).val();
    var key = e.which || this.value.substr(-1).charCodeAt(0);

    if (key === 8 || key === 13 || key === 37 || key === 39 || key === 46) {
        return;
    }

    if ((key > 47 && key < 58) || (key > 95 && key < 106)) {
        var c = String.fromCharCode(key);
        var val = parseInt(c);
        var textVal = parseInt(targetValue || "0");
        var result = textVal + val;

        var id = $(this).attr('id');
        if (id.localeCompare("height_ft") === 0 && (result < 0 || result > 9 || targetValue.length >= 1)) {
            e.preventDefault();
            $('.q-measure input#height_in').focus();
        } else if (id.localeCompare("height_in") === 0 && (result < 0 || result > 99 || targetValue.length >= 2)) {
            e.preventDefault();
            $('.q-measure input#age').focus();
        } else if (id.localeCompare("age") === 0 && (result < 0 || result > 99 || targetValue.length >= 2)) {
            e.preventDefault();
            $(this).blur();
        } else if (id.localeCompare("height_cm") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input#age').focus();
        } else if (id.localeCompare("curr_weight_po") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input#goal_weight_po').focus();
        } else if (id.localeCompare("goal_weight_po") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $(this).blur();
        } else if (id.localeCompare("curr_weight_kg") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input#goal_weight_kg').focus();
        } else if (id.localeCompare("goal_weight_kg") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $(this).blur();
        }

        if (targetValue === "0") {
            $(this).val(val);
            e.preventDefault();
        }
    } else {
        e.preventDefault();
    }
});

$('.input-term').change(function () {
    if ($(this).is(":checked")) {
        if ($(this).val() === 'imperial') {
            $('.q-measure-metric').hide();
            $('.q-measure-imperial').show();
            $('.q-measure-metric input[type=number]').prop("disabled", true);
            $('.q-measure-imperial input[type=number]').prop("disabled", false);
        } else {
            $('.q-measure-metric').show();
            $('.q-measure-imperial').hide();
            $('.q-measure-metric input[type=number]').prop("disabled", false);
            $('.q-measure-imperial input[type=number]').prop("disabled", true);
        }
    }
});

$('.button-weeks-right').click(function () {
    if ($(".m-meal-weeks__select > option:selected").index() != 8) {
        $(".m-meal-weeks__select > option:selected")
                .prop("selected", false)
                .next()
                .prop("selected", true);
        $(".m-meal-weeks__select").trigger('change');
    }
});

$('.button-weeks-left').click(function () {
    if ($(".m-meal-weeks__select > option:selected").index() != 0) {
        $(".m-meal-weeks__select > option:selected")
                .prop("selected", false)
                .prev()
                .prop("selected", true);
        $(".m-meal-weeks__select").trigger('change');
    }
});

function saveHash(strHash) {
    if (history.pushState) {
        history.pushState(null, null, strHash);
    } else {
        location.hash = strHash;
    }

    gtag('config', 'UA-122527750-1', {'page_path': location.pathname + location.search + location.hash});

    if (strHash !== "#summary") {
        //save current form and step number///+++
        ///+++ last page retarget test 2
        /*
         var serialized_value = $('#msform').serializeArray();
         console.log(form_data_key);
         console.log(serialized_value);
         localStorage.setItem(form_data_key, JSON.stringify(serialized_value));
         */
        // last page retarget end
    }
    localStorage.setItem(current_step_key, strHash);
}


//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).on('click', '.action-button.next', function (event) {

    event.preventDefault();

    if (animating)
        return false;
    animating = true;

    current_fs = $(this).parent().parent();
    next_fs = $(this).parent().parent().next();




    //activate next step on progressbar using the index of next_fs
//    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    var duration = 800;
    /* navbar image background */
    var nextQuizIndex = $("fieldset").index(next_fs);

    if (nextQuizIndex < 0) {

        if (!validateForm(false)) {
            animating = false;
            return;
        }
        var height = 0.0;
        var curr_weight = 0.0;
        var goal_weight = 0.0;
        if ($('#msform input[name="input_term"]:checked').val() === 'metric') {
            var height_cm = parseInt($('#height_cm').val(), 10);
            var curr_weight_kg = parseInt($('#curr_weight_kg').val(), 10);
            var goal_weight_kg = parseInt($('#goal_weight_kg').val(), 10);
            curr_weight = curr_weight_kg * 2.20462;
            goal_weight = goal_weight_kg * 2.20462;
        } else {
            var height_ft = parseInt($('#height_ft').val(), 10);
            var height_in = !check_input_value($('#height_in')) ? 0 : parseInt($('#height_in').val(), 10);            
            height = height_ft * 12 + height_in;
            curr_weight = parseInt($('#curr_weight_po').val(), 10);
            goal_weight = parseInt($('#goal_weight_po').val(), 10);
        }
        $('#msform input[name="height"]').val(height);
        $('#msform input[name="curr_weight"]').val(curr_weight);
        $('#msform input[name="goal_weight"]').val(goal_weight);

        saveFormToLocalStorage();

//        if ($('.processing-area .button-area').css("visibility") == "hidden") {
        $('#progress').html('');
        $('.processing-area #processing_carousel').show();
        $('.processing-area .button-area').css('visibility', 'hidden');

        playProcessing();

        removeStepnumClass();
        $('body').removeClass('stepping').addClass('processing');
        $(document).scrollTop(0);
        $('footer').hide();

    } else {
        if (nextQuizIndex === 15) {
            if (!validateForm(true)) {
                animating = false;
                return;
            }
        }

        removeStepnumClass();
        $('body.stepping').addClass(('stepnum' + (nextQuizIndex + 2)));

        $('footer').hide();
    }


    //show the next fieldset
    next_fs.show();

//    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
//    if (iOS) {
//        $('.q-measure input[name="height_ft"]').focus();
//    }

    var maxHeight = next_fs.height() > current_fs.height() ? next_fs.height() : current_fs.height();
    $('#msform').height(maxHeight);

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            if (now < 1) {
//                return;
            }


            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;

            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;

            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'relative',
                'top': 0
            });
            next_fs.css({'left': left, 'opacity': opacity, 'position': 'absolute', 'top': '0'});
//            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: duration,
        complete: function () {
            current_fs.hide();
            current_fs.css({
                'transform': 'scale(1)',
                'opacity': 1
            });
            animating = false;

            current_fs = next_fs;
            current_fs.css({'position': 'relative'});
            $('#msform').height('initial');

            if (nextQuizIndex >= 0) {
                var strHash = "#" + (nextQuizIndex + 2);
                saveHash(strHash);
            }

            if (nextQuizIndex == 1) {
                // jumbleberry("init", "9AjB2Ho3E4Y8QdikAkP-0xf074T4KB17rj06I1oTX01yUbq9bipKJ39elFU5ys8qk0VpmLCnxMf4-Xb07AhjvA~~");
                // jumbleberry("track", "ViewContent");
            }

            if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) { // if NOT mobile devices
                adjustQMeasure(nextQuizIndex);
            }
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".action-button.previous").click(function (event) {
    event.preventDefault();

    if (animating)
        return false;
    animating = true;

    current_fs = $(this).parent().parent();
    previous_fs = $(this).parent().parent().prev();

    var nextQuizIndex = $("fieldset").index(previous_fs);


    var duration = 800;
    removeStepnumClass();
    if (nextQuizIndex === -1) {
        history.back();
        return;
    } else {
        $('body.stepping').addClass(('stepnum' + (nextQuizIndex + 2)));
        $('footer').hide();
    }



    //show the previous fieldset
    previous_fs.show();

    var maxHeight = previous_fs.height() > current_fs.height() ? previous_fs.height() : current_fs.height();
    $('#msform').height(maxHeight);

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left, 'position': 'relative'});
            previous_fs.css({
                'transform': 'scale(' + scale + ')',
                'opacity': opacity,
                'position': 'absolute'
            });
        },
        duration: duration,
        complete: function () {
            current_fs.hide();
            current_fs.css({
                'transform': 'scale(1)',
                'opacity': 1,
                'left': 'initial'
            });

            animating = false;
            current_fs = previous_fs;

            current_fs.css({'position': 'relative'});
            $('#msform').height('initial');

            var strHash = "#" + (nextQuizIndex + 2);
//            saveHash(strHash);

            history.back();


            if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) { // if NOT mobile devices
                adjustQMeasure(nextQuizIndex);
            }
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

function gotoPage(index) {

}

$(document).on('click', '.email-area .btn-continue', function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (!validateEmailForm()) {
        return;
    }

    var obj_answers = JSON.parse(localStorage.getItem(form_data_key));
    if (!obj_answers) {
        window.location.href = base_url();
        alert("To process your custom meal plan please complete the quiz to select your preferences.");
    }

    var email = $('.email-area #input-email').val();

    obj_answers['email'] = email;
    obj_answers['first_name'] = $('.email-area #input-first-name').val();
    localStorage.setItem(form_data_key, JSON.stringify(obj_answers));

    var obj_additional = startCalculation();

    var version = "main";
    var international = 0;
    if (window.location.href.indexOf("/get/") > -1) {
        version = "get";
    } else if (window.location.href.indexOf("/start/") > -1) {
        version = "start";
    } else if (window.location.href.indexOf("/esc/") > -1) {
        version = "esc";
        international = 1;
    } else if (window.location.href.indexOf("/plans/") > -1) {
        version = "plans";
    }
    obj_additional['version'] = version;
    obj_additional['international'] = international;
    obj_additional['sid'] = localStorage.getItem('sid');
    obj_additional['cid'] = localStorage.getItem('cid');
    obj_additional['client_ip'] = localStorage.getItem('client_ip');
    obj_additional['international'] = international;

    if (obj_answers) {
        $('.email-area .btn-continue .ta-spinner').css('visibility', 'visible');

        $.ajax({
            type: "POST",
            url: base_url() + 'api/answer',
            data: {"obj_answers": obj_answers, "obj_additional": obj_additional},
            dataType: "json",
            success: function (resp) {
                console.log("answer_post response is :");
                console.log(resp);
                //affiliate code start
                var data1 = getQueryString('data1');
                var a_aid = getQueryString('a_aid');
                if (data1 && data1.length > 0 && a_aid && a_aid == "db1e6546") {
                    var postbackUrl = 'https://cors-anywhere.herokuapp.com/https://track.ingwire.com/postback?cid=' + data1 + '&txid=KSK-email&et=email_signup';

                    var jqxhr = $.post(postbackUrl, function () {
                        console.log("affiliate success");
                    })
                            .done(function () {
                                console.log("affiliate second success");
                            })
                            .fail(function (xhr, status, error) {
                                console.log(xhr, status, error);
                                console.log("affiliate error");
                            })
                            .always(function () {
                                console.log("affiliate finished");
                            });
                }
                //affiliate code end

                $('.email-area .btn-continue .ta-spinner').css('visibility', 'hidden');
                window.location.href = base_url() + "summary";

            },
            error: function (xhr, status, error) {
                $('.email-area .btn-continue .ta-spinner').css('visibility', 'hidden');
                var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                if (errorMessage.length > 0) {
                    $('.email-area .warning-text').text(errorMessage);
                    $('.email-area .warning-text').css('display', 'inline-block');
                }
            }
        });
    } else {
        window.location.href = base_url();
        alert("To process your custom meal plan please complete the quiz to select your preferences.");
    }
});

function validateForm(isHeightAge) {
    var returnVal = true;
    var inputIds = [];

    if ($('#msform input[name="input_term"]:checked').val() === 'imperial') {
        if (isHeightAge) {
            inputIds = ['height_ft', 'age'];
        } else {
            inputIds = ['goal_weight_po', 'curr_weight_po'];
        }
    } else {
        if (isHeightAge) {
            inputIds = ['height_cm', 'age'];
        } else {
            inputIds = ['goal_weight_kg', 'curr_weight_kg'];
        }
    }

    var str_warning = '';

    for (var i in inputIds) {
        var strSelector = '#msform input#' + inputIds[i];

        if (!$(strSelector).val()) {
            $(strSelector).addClass('warning');
            str_warning = 'Oops!  Please enter your selection before proceeding to the next page.';
            returnVal = false;
        } else {
            if ((inputIds[i] == "age")
                    && ($(strSelector).val() < 18 || $(strSelector).val() > 90)) {
                str_warning = "Please enter between 18 and 90 for your age.";
                $('fieldset.q-measure-height-age .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "height_ft")
                    && (($(strSelector).val() < 3 || ($(strSelector).val() == 3 && $('#msform input#height_in').val() < 6)) ||
                            ($(strSelector).val() > 7 || ($(strSelector).val() == 7 && $('#msform input#height_in').val() > 10))
                            )) {
                str_warning = "Please enter between 3ft 6in and 7ft 10in for your height.";
                $('fieldset.q-measure-height-age .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "height_cm")
                    && ($(strSelector).val() < 106 || $(strSelector).val() > 238)) {
                str_warning = "Please enter between 106cm and 238cm for your height.";
                $('fieldset.q-measure-height-age .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "curr_weight_po")
                    && ($(strSelector).val() < 90 || $(strSelector).val() > 850)) {
                str_warning = "Please enter between 90lbs and 850lbs for your current weight.";
                $('fieldset.q-measure-weight .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "goal_weight_po")
                    && ($(strSelector).val() < 90 || $(strSelector).val() > 500)) {
                str_warning = "Please enter between 90lbs and 500lbs for your goal weight.";
                $('fieldset.q-measure-weight .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "curr_weight_kg")
                    && ($(strSelector).val() < 40 || $(strSelector).val() > 385)) {
                str_warning = "Please enter between 40kg and 385kg for your current weight.";
                $('fieldset.q-measure-weight .warning-text').text(str_warning);
                returnVal = false;
            } else if ((inputIds[i] == "goal_weight_kg")
                    && ($(strSelector).val() < 40 || $(strSelector).val() > 227)) {
                str_warning = "Please enter between 40kg and 227kg for your goal weight.";
                $('fieldset.q-measure-weight .warning-text').text(str_warning);
                returnVal = false;
            } else {
                $(strSelector).removeClass('warning');
            }
        }
    }
    if (!returnVal) {
        if (isHeightAge) {
            $('fieldset.q-measure-height-age .warning-text').css('display', 'inline-block');
        } else {
            $('fieldset.q-measure-weight .warning-text').css('display', 'inline-block');
        }
    } else {
        if (isHeightAge) {
            $('fieldset.q-measure-height-age .warning-text').hide();
        } else {
            $('fieldset.q-measure-weight .warning-text').hide();
        }
    }

    return returnVal;
}

function validateEmailForm() {
    var returnVal = true;

    var email = $('.email-area #input-email').val();
    var strWarning = "";

    var first_name = $('.email-area #input-first-name').val();
    if (first_name && first_name.length === 0) {
        strWarning = "Please enter first name.";
    }

    if (email.length === 0) {
        strWarning = "Please enter email address.";
    } else if (!validateEmail(email)) {
        strWarning = "Please enter valid email address.";
    }
    $('.email-area .warning-text').text(strWarning);
    if (strWarning.length > 0) {
        $('.email-area .warning-text').css('display', 'inline-block');
        returnVal = false;
    } else {
        $('.email-area .warning-text').hide();
    }

    return returnVal;
}


$('.email-area #input-email').on('change', function () {
    validateEmailForm();
});
$('.email-area .tos-link').click(function (e) {
    e.preventDefault();

    var link = $(this).attr("href");

    var h = screen.height * .8;
    var w = screen.width * .8;
    window.open(this.href, link, 'toolbar=no ,location=0, status=no,titlebar=no,menubar=no,width=' + w + ',height=' + h);
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function playProcessing() {
    var circle = new ProgressBar.Circle('#progress', {
        color: '#F9464B',
        duration: 5000,
        easing: 'easeInOut',
        trailColor: '#EDD1D1',
        trailWidth: 6,
        strokeWidth: 6,
        svgStyle: null,
        text: {
            autoStyleContainer: false
        },
        step: function (state, circle) {
            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                var html = value + "<span class=percent-span>%</span>";
                circle.setText(html);
            }
        }
    });
    circle.text.style.fontFamily = 'Proxima Nova Bold';
    circle.text.style.fontSize = '6.5rem';

    circle.animate(1, function () {
        $('.processing-area #processing_carousel').hide();
        $('.processing-area .button-area').css('visibility', 'visible');
        if ($('body').hasClass('processing')) {
            setTimeout(function () {
                // main version
                window.location.href = base_url() + "email";

                // email retarget version ///+++
                /*
                 var email = getQuizDataFromLocalStorage('email');
                 if (!email || email && email.length == 0) {
                 window.location.href = base_url() + "email";
                 } else {
                 window.location.href = base_url() + "summary";
                 }
                 */
                // email retarget version end


            }, 1000);
        }
    });
    carouselAnimStart();
}
var processing_text_counter = 0;
var processing_timer;
function carouselAnimStart() {
    processing_timer = setInterval(carouselTimer, 700);
}
function carouselTimer() {
    var selector = "#processing_carousel li:eq(" + processing_text_counter + ")";
    $(selector).css('visibility', 'visible');
    processing_text_counter++;
    if (processing_text_counter >= $('#processing_carousel li').length) {
        processing_text_counter = 0;
        clearInterval(processing_timer); // uncomment this if you want to stop refreshing after one cycle
    }
}

function removeStepnumClass() {
    $('body').removeClass(function (index, className) {
        return (className.match(/(^|\s)stepnum\S+/g) || []).join(' ');
    });
}

function readmoreClicked(btn_readmore) {
    var moreText = $(btn_readmore).parent().find('.more-text');
    var btnText = $(btn_readmore);
    var parent = $(btn_readmore).parent();

    if ($(moreText).css('display') != 'none') {
//    if ($(btnText).html() == 'Read Less') {
        $(btnText).html('<span>Learn More </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>');
        $(moreText).hide();
//        $(parent).css('height', '8.3rem');
    } else {
        $(btnText).html('<span>Show Less </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-up"></use></svg>');
        $(moreText).css('display', 'inline');
        $(parent).css('height', 'initial');
    }
}

/* pricing page accordion menu */
$(document).on('click', '.accordion', function (event) {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
    }

    if ($(this).hasClass('active')) {
        $(this).find("svg").html('<svg class="icon"><use xlink:href="#angle-up"></use></svg>');
    } else {
        console.log("inactive");
        $(this).find("svg").html('<svg class="icon"><use xlink:href="#angle-down"></use></svg>');
    }
});

function getQueryString() {// use instead of searchParams
    var key = false, res = {}, itm = null;
    // get the query string without the ?
    var qs = location.search.substring(1);
    // check for the key as an argument
    if (arguments.length > 0 && arguments[0].length > 1)
        key = arguments[0];
    // make a regex pattern to grab key/value
    var pattern = /([^&=]+)=([^&]*)/g;
    // loop the items in the query string, either
    // find a match to the argument, or build an object
    // with key/value pairs
    while (itm = pattern.exec(qs)) {
        if (key !== false && decodeURIComponent(itm[1]) === key)
            return decodeURIComponent(itm[2]);
        else if (key === false)
            res[decodeURIComponent(itm[1])] = decodeURIComponent(itm[2]);
    }

    return key === false ? res : null;
}

// Unused functions
function populateForm(data) {

    var obj_answers = JSON.parse(localStorage.getItem(form_data_key));
    if (!obj_answers) {
        return null;
    }

    for (let [key, value] of Object.entries(obj_answers)) {
        console.log(`${key}: ${value}`);
        var ctrl = $('[name=' + key + ']', $('#msform'));
        if (ctrl.prop("type") == "checkbox") {
            if ($(ctrl).attr('value') == value)
                $(ctrl).attr("checked", value);
        } else if (ctrl.prop("type") == "radio") {
            var ctrl = $('[name=' + key + '][value=' + value + ']', $('#msform'));
            $(ctrl).prop('checked', true);
        } else {
            ctrl.val(value);
        }
    }
}

$(document).on('click', '.switch-video', function (e) {
    var id = $(this).attr('id');
    $(this).addClass('selected');
    $('.twovideosection .switch-video').not(this).removeClass('selected');
});

var fs_checkout_completed = false;
function dataPopupWebhookReceived(data) {
    console.log(data);
    var fs_order_id = data.id;
    fs_checkout_completed = false;

    /* serialized_value start */
    $.ajax({
        type: "POST",
        url: "https://simpleketosystem.com/fastspring/api/checkout_fs.php",
        data: {'fs_order_id': fs_order_id},
        dataType: "json",
        success: function (resp) {
            console.log('checkout.php resp!!!');
            console.log(resp);
            fs_checkout_completed = true;
//            if (base_url().indexOf('simpleketosystem.com/fastspring') > -1 && base_url().indexOf('simpleketosystem.com/fastspring2') == -1) {
//                window.location.replace("https://simpleketosystem.com/mealplan?uid=" + orderReference.id);
//            } else if (base_url().indexOf('simpleketosystem.com/fastspring2') > -1) {
//                var email = getQuizDataFromLocalStorage('email');
//                window.location.replace(base_url() + 'upsell?email=' + encodeURIComponent(email) + '&uid=' + orderReference.id);
//            }
        }
        ,
        error: function (response) {
            console.log(response);
            console.log(JSON.stringify(response));
            $('body').addClass("remove");
            //alert("Error:" + response);
        }
    });
    /* serialized_value end */
}

function onFSPopupClosed(orderReference) {
    if (orderReference && fs_checkout_completed)
    {
        console.log(orderReference.reference);
        console.log(orderReference.id);
        window.location.replace("https://simpleketosystem.com/mealplan?uid=" + orderReference.id);

    } else {
        console.log("no order ID");
    }
}

if (base_url().indexOf('simpleketosystem.com/2m') > -1) {
    $(".twom-section input[type='radio']").click(function () {
        var carthook_url = "https://konsciousketo.com/a/secure/checkout/voH0885yCCnPFbGxsXtc";
        if ($(this).attr('id') == "radio-1m" || $(this).attr('id') == "radio-1m-1") {
            $('#radio-1m').prop('checked', true);
            $('#radio-1m-1').prop('checked', true);
            carthook_url = "https://konsciousketo.com/a/secure/checkout/4eyT2bsVDPTmKEdAkxdv";
        }
        if ($(this).attr('id') == "radio-2m" || $(this).attr('id') == "radio-2m-1") {
            $('#radio-2m').prop('checked', true);
            $('#radio-2m-1').prop('checked', true);
            carthook_url = "https://konsciousketo.com/a/secure/checkout/voH0885yCCnPFbGxsXtc";
        }
        if ($(this).attr('id') == "radio-12m" || $(this).attr('id') == "radio-12m-1") {
            $('#radio-12m').prop('checked', true);
            $('#radio-12m-1').prop('checked', true);
            carthook_url = "https://konsciousketo.com/a/secure/checkout/8PE1obxa9CdgbjDFgMPU";
        }

        var email = getQuizDataFromLocalStorage('email');
        if (!email || email && email.length == 0) {
            var visit = getQueryString('visit');
            if (!(visit && visit == "admin")) {
                window.location.href = base_url();
                alert("To process your custom meal plan please complete the quiz to select your preferences.");
            }
        }
        var carthook_payment_link = carthook_url + "?email=" + encodeURIComponent(email);
        $('body.pricing .btn-continue.submit').attr('href', carthook_payment_link);
    });
}

function check_input_value(w) {
    if (isNaN(parseInt(w))) {
        return false;
    } else if (w < 0) {
        return false;
    } else {
        return true;
    }
}