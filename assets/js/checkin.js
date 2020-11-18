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
                $('.q-measure input[name="height_cm"]').focus();
            } else if (nextQuizIndex == 15) {
                $('.q-measure input[name="curr_weight_kg"]').focus();
            }
        } else {
            $('.q-measure-metric').hide();
            $('.q-measure-imperial').show();
            if (nextQuizIndex == 14) {
                $('.q-measure input[name="height_ft"]').focus();
            } else if (nextQuizIndex == 15) {
                $('.q-measure input[name="curr_weight_po"]').focus();
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

$("fieldset.single-option input[type='radio']").click(function () {
    $(this).closest("fieldset").find('.btn-next').click();
});

$('.q-radio-measure').change(function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().parent().siblings().find('.q-radio-measure').prop('checked', false);
        $(this).siblings().find('input[type=number]:first').focus();
    } else {
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

        var name = $(this).attr('name');
        if (name.localeCompare("height_ft") === 0 && (result < 0 || result > 9 || targetValue.length >= 1)) {
            e.preventDefault();
            $('.q-measure input[name="height_in"]').focus();
        } else if (name.localeCompare("height_in") === 0 && (result < 0 || result > 99 || targetValue.length >= 2)) {
            e.preventDefault();
            $('.q-measure input[name="age_imperial"]').focus();
        } else if (name.localeCompare("age_imperial") === 0 && (result < 0 || result > 99 || targetValue.length >= 2)) {
            e.preventDefault();
            $(this).blur();
        } else if (name.localeCompare("height_cm") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input[name="age_metric"]').focus();
        } else if (name.localeCompare("age_metric") === 0 && (result < 0 || result > 99 || targetValue.length >= 2)) {
            e.preventDefault();
            $(this).blur();
        } else if (name.localeCompare("curr_weight_po") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input[name="goal_weight_po"]').focus();
        } else if (name.localeCompare("goal_weight_po") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $(this).blur();
        } else if (name.localeCompare("curr_weight_kg") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
            e.preventDefault();
            $('.q-measure input[name="goal_weight_kg"]').focus();
        } else if (name.localeCompare("goal_weight_kg") === 0 && (result < 0 || result > 999 || targetValue.length >= 3)) {
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

$(document).on('click', '.btn-next, .btn-nav.skip', function (event) {

    event.preventDefault();

    if (animating)
        return false;
    animating = true;

    current_fs = $(this).closest('fieldset');
    next_fs = current_fs.next();




    //activate next step on progressbar using the index of next_fs
//    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    var duration = 800;
    /* navbar image background */
    var nextQuizIndex = $("fieldset").index(next_fs);

    if (nextQuizIndex < 0) {
//        if ($('.processing-area .button-area').css("visibility") == "hidden") {

        $('.quiz-area').addClass('d-none');
        $('.processing-area').removeClass('d-none');
        $('.processing-area .base-timer .base-timer__path-remaining').animate({'stroke-dashoffset': 566}, {
            duration: 5000,
            easing: 'easeInOutQuart',
            step: function (now, fx) {
                var percentage = Math.round((now - 283.0) / 283 * 100);
                $('.base-timer .base-timer__label span').html(percentage);
            },
            complete: function () {
                $('#msform').submit();
            }
        });
        $('.processing-area .processing-texts p').each(function (i) {
            $(this).delay(1000 * i).fadeIn();
        });


        removeStepnumClass();
        $('body').removeClass('stepping').addClass('processing');
        $(document).scrollTop(0);
        $('footer').hide();

    } else {
        if ((nextQuizIndex === 1 && !validate_form('curr_weight')) ||
                (nextQuizIndex === 4 && !validate_form('waist'))) {
            animating = false;
            return;
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

$("#msform .btn-nav.back").click(function (event) {
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

function validate_form(input_name) {
    var val_return = true;
    var str_selector = '#msform input[name="' + input_name + '"]';
    var value = $(str_selector).val();
    var input_term = $('#msform #input_term').val();
    if (input_name == "curr_weight") {
        if (input_term == "imperial") {
            if (value < 90 || value > 850) {
                str_warning = "Please enter between 90lbs and 850lbs for your current weight.";
                $('.warning-wrapper .warning-curr-weight').text(str_warning).addClass('active');
                val_return = false;
            } else {
                $('.warning-wrapper .warning-curr-weight').removeClass('active');
                val_return = true;
            }
        } else {
            if (value < 40 || value > 385) {
                str_warning = "Please enter between 40kg and 385kg for your current weight.";
                $('.warning-wrapper .warning-curr-weight').text(str_warning).addClass('active');
                val_return = false;
            } else {
                $('.warning-wrapper .warning-curr-weight').removeClass('active');
                val_return = true;
            }
        }
    } else if (input_name == "waist") {
        if (input_term == "imperial") {
            if (value < 10 || value > 100) {
                str_warning = "Please enter between 10inch and 100inch for your current waist.";
                $('.warning-wrapper .warning-waist').text(str_warning).addClass('active');
                val_return = false;
            } else {
                $('.warning-wrapper .warning-waist').removeClass('active');
                val_return = true;
            }
        } else {
            if (value < 30 || value > 250) {
                str_warning = "Please enter between 30cm and 350cm for your current waist.";
                $('.warning-wrapper .warning-waist').text(str_warning).addClass('active');
                val_return = false;
            } else {
                $('.warning-wrapper .warning-waist').removeClass('active');
                val_return = true;
            }
        }
    }
    return val_return;
}

function removeStepnumClass() {
    $('body').removeClass(function (index, className) {
        return (className.match(/(^|\s)stepnum\S+/g) || []).join(' ');
    });
}

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