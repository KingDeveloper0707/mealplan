$(document).ready(function () {
    $(document).on('click', '.btn-continue', function (event) {
        event.preventDefault();
        event.stopPropagation();
        
        var email = $('#input-email').val();

        $.ajax({
            type: "POST",
            url: base_url() + 'api/getuid.php',
            data: {'email': email},
            dataType: "json",
            success: function (resp) {
                var getUrl = window.location;

                if (!resp['uid'] || resp['uid'].length === 0) {                    
                    var strWarning = "There is no meal plan registered under this email address. Please contact customer support.";
                    alert(strWarning);
                } else {
                    var mealplanUrl = base_url() + "/mealplan?uid=" + resp['uid'] + "&visit=admin";
                    window.open(mealplanUrl, "_blank");
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                alert('Error - ' + errorMessage);
            }
        });
    });
});