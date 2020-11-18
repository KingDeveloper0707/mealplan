$(document).ready(function () {
    $('.food-preference-wrapper input[type=checkbox]').change(function () {
        var name = $(this).attr('name');

        if ($(this).closest('.card').hasClass('q-meat')) {
            if (name === 'no_meat') {
                if ($(this).is(":checked")) {
                    $(".card.q-meat input[name!='no_meat']").prop('checked', false);
                }
            } else {
                if ($(this).is(":checked")) {
                    $(".card.q-meat input[name='no_meat']").prop('checked', false);
                } else {
                    var checkednum = $(".card.q-meat input[type='checkbox']:checked").length;
                    if (checkednum === 0) {
                        $(".card.q-meat input[name='no_meat']").prop('checked', true);
                    }
                }
            }
        }
        var serialized_value = $('#form-food-preference').serializeArray();

        $.ajax({
            type: "POST",
            url: base_url() + 'api/update_answer_preference',
            data: serialized_value,
            dataType: "json",
            success: function (resp) {
                //console.log('answer put resp!!!');
                //console.log(resp);
            },
            error: function (response) {
                console.log(response);
                console.log(JSON.stringify(response));
                alert("Error:" + response);
            }
        });
    });

    $('.unit-wrapper input[type=radio]').change(function () {
        var serialized_value = $('#form-input-term').serializeArray();

        $.ajax({
            type: "POST",
            url: base_url() + 'api/update_input_term',
            data: serialized_value,
            dataType: "json",
            success: function (resp) {
                //console.log('answer put resp!!!');
                //console.log(resp);
            },
            error: function (response) {
                console.log(response);
                console.log(JSON.stringify(response));
                alert("Error:" + response);
            }
        });
    });
});