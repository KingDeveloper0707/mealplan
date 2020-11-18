$(document).ready(function () {
    $(window).on('load', function () {
        var data = {'customer_id': $('#surveyModal #form-survey input[name=customer_id]').val()};
        $.ajax({
            type: "GET",
            url: base_url() + 'api/check_survey_again',
            data: data,
            dataType: "json",
            success: function (resp) {
                console.log(resp);
                if (resp.survey_again == true) {
                    $('#surveyModal').modal('show');
                }
            },
            error: function (response) {
            }
        });

    });
    $(document).on('change', 'form#form-survey input', function (event) {
        if ($(this).val() == "1" || $(this).val() == "2") {
            $.ajax({
                type: "POST",
                url: base_url() + 'api/survey',
                data: $('form#form-survey').serialize(),
                dataType: "json",
                success: function (resp) {
                    $('#surveyModal .mood-wrapper').hide();
                    $('#surveyModal .thankyou-wrapper').show();
                },
                error: function (response) {
                }
            });
        } else {
            $('#surveyModal').removeClass('mood').addClass('note');
        }
    });

    $(document).on('click', 'input[type=submit]', function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: base_url() + 'api/survey',
            data: $('form#form-survey').serialize(),
            dataType: "json",
            success: function (resp) {
                $('#surveyModal').removeClass('note').addClass('thankyou');
            },
            error: function (response) {
            }
        });
    });
});