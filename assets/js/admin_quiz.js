$(document).ready(function () {
    $("input[type='radio'][name='gender']").click(function () {
        if (parseInt($(this).val())) {            
            $('form#mainform').removeClass('female-theme').addClass('male-theme');
        } else {            
            $('form#mainform').removeClass('male-theme').addClass('female-theme');
        }
    });

    $(".form-row.q-meat input[type='checkbox']").change(function () {
        var name = $(this).attr('name');
        if (name === 'no_meat') {
            if ($(this).is(":checked")) {
                $(".form-row.q-meat input[name!='no_meat']").prop('checked', false);
            }
        } else {
            if ($(this).is(":checked")) {
                $(".form-row.q-meat input[name='no_meat']").prop('checked', false);
            } else {
                var checkednum = $(".form-row.q-meat input[type='checkbox']:checked").length;
                if (checkednum === 0) {
                    $(".form-row.q-meat input[name='no_meat']").prop('checked', true);
                }
            }
        }
    });

    $(".form-row.q-changes input[type='radio']").change(function () {
        var name = $(this).attr('name');
        if (name === 'q_changes_none') {
            if ($(this).is(":checked")) {
                $(".form-row.q-changes input[name!='q_changes_none']").prop('checked', false);
            }
        } else {
            if ($(this).is(":checked")) {
                $(".form-row.q-changes input[name='q_changes_none']").prop('checked', false);
            } else {
                var checkednum = $(".form-row.q-changes input[type='radio']:checked").length;
                if (checkednum === 0) {
                    $(".form-row.q-changes input[name='no_meat']").prop('checked', true);
                }
            }
        }
    });

    $("input[type='radio'][name='input_term']").click(function () {
        if (parseInt($(this).val())) {
            $('.form-row.form-metric').hide();
            $('.form-row.form-imperial').show();
        } else {
            $('.form-row.form-metric').show();
            $('.form-row.form-imperial').hide();
        }
    });
    
    $("input[type='radio'][name='is_onetime']").click(function () {
        if (parseInt($(this).val())) {
            $('.form-row#weeknum-subscription').hide();
            $('.form-row#weeknum-onetime').show();
        } else {
            $('.form-row#weeknum-subscription').show();
            $('.form-row#weeknum-onetime').hide();
        }
    });

    $('.btn-submit').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var serialized_value = $('#mainform').serializeArray();
        console.log(serialized_value);

        $.ajax({
            type: "POST",
            url: base_url() + 'api/getquickmealplan.php',
            data: serialized_value,
            dataType: "json",
            success: function (resp) {
                console.log('getquickmealplan.php resp!!!');
                console.log(resp);                
                
                var mealplanUrl = base_url() + "mealplan?uid=" + resp['uid'];
                window.open(mealplanUrl, "_blank");
                
            },
            error: function (response) {
                console.log(response);
                console.log(JSON.stringify(response));
                alert("Error:" + response);
            }
        });
    })
});
