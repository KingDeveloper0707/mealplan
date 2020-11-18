var password_length_valid = false;
var password_number_symbol_valid = false;
var password_confirm_match_valid = false;
$(document).on('keyup', '#input-password', function (event) {

    var input = $(this).val();
    if (input.length >= 8) {
        $('.warning-length').removeClass('active').addClass('inactive');
        password_length_valid = true;
    } else {
        $('.warning-length').removeClass('inactive').addClass('active');
        password_length_valid = false;
    }

    var regex_symbol_number = new RegExp(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]|[0-9]/);
    if (regex_symbol_number.test(input)) {
        $('.warning-symbol-number').removeClass('active').addClass('inactive');
        password_number_symbol_valid = true;
    } else {
        $('.warning-symbol-number').removeClass('inactive').addClass('active');
        password_number_symbol_valid = false;
    }

    check_form_validity();
});

$(document).on('keyup', '#input-password-confirm, #input-password', function (event) {

    if ($(this).val().length > 0 &&
            $('#input-password-confirm').val() === $('#input-password').val()) {
        $('.warning-match').removeClass('active').addClass('inactive');
        password_confirm_match_valid = true;
    } else {
        $('.warning-match').removeClass('inactive').addClass('active');
        password_confirm_match_valid = false;
    }
    check_form_validity();

});

$(document).on('keyup', '#input-login-email', function (event) {

    if ($('#input-login-email').val().length > 0 &&
            $('#input-login-password').val().length > 0
            ) {
        $(':input[type="submit"]').prop('disabled', false);
    } else {
        $(':input[type="submit"]').prop('disabled', true);
    }
});

$(document).on('keyup', '#input-login-password', function (event) {

    if ($('#input-login-email').val().length > 0 &&
            $('#input-login-password').val().length > 0
            ) {
        $(':input[type="submit"]').prop('disabled', false);
    } else {
        $(':input[type="submit"]').prop('disabled', true);
    }
});

$(document).on('keyup', '#input-reset-pw-email', function (event) {

    if ($('#input-reset-pw-email').val().length > 0) {
        $(':input[type="submit"]').prop('disabled', false);
    } else {
        $(':input[type="submit"]').prop('disabled', true);
    }
});

//$(document).on('click', '#register-submit', function (e) {
//
//    e.preventDefault();
//    var email = $('#input-email').val();
//    if(!validateEmail(email)) {
//        $('.warning-signup-email').removeClass('inactive').addClass('active');
//        $('.warning-signup-email').HTML("You've entered an invalid email, please try again.");
//    } else {
//        $('#form-register').submit();
//    }
//});

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$(document).on('click', '#login-submit', function (e) {

    e.preventDefault();
    console.log('login-submit !');
    var email = $('#input-login-email').val();
    if(!email || !email.length || !validateEmail(email)) {
        $('.warning-login-email').removeClass('d-none');
    } else {        
        $('#form-login').submit();
    }
});

$(document).on('click', '#reset-pw-submit', function (e) {

    e.preventDefault();
    console.log('reset-pw-submit !');
    var email = $('#input-reset-pw-email').val();
    if(!email || !email.length || !validateEmail(email)) {
        $('.warning-pw-reset-email').removeClass('d-none');
    } else {        
        $('#form-pw-reset').submit();
    }
});

function check_form_validity() {
    if (password_length_valid && password_number_symbol_valid && password_confirm_match_valid) {
        $(':input[type="submit"]').prop('disabled', false);
    } else {
        $(':input[type="submit"]').prop('disabled', true);
    }
}

function toggle_password(ele) {
    if ($(ele).hasClass('fa-eye-slash')) {
        $(ele).removeClass('fa-eye-slash').addClass('fa-eye');
        $(ele).prev('input[type=password]').attr('type', 'text');
    } else {
        $(ele).removeClass('fa-eye').addClass('fa-eye-slash');
        $(ele).prev('input[type=text]').attr('type', 'password');
    }
}