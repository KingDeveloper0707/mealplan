$(document).ready(function () {
    $(document).on('click', '.btn-continue', function (event) {
        event.preventDefault();
        event.stopPropagation();
        
        var email = $('#input-email').val();
        if(!email || !email.length) {
            alert("Please enter correct email address");
            return;
        }
        var create_time = $('#input-datetime').val();

        $.ajax({
            type: "POST",
            url: base_url() + 'api/update_checkout_create_time',
            data: {'email': email, 'create_time' : create_time},
            dataType: "json",
            success: function (resp) {
                console.log(resp);
                if(resp['status'] == 'success') {
                    alert("This customer's last purchase date has successfully been updated!");
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
                alert('Error - ' + errorMessage);
            }
        });
    });
});