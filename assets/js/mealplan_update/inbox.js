$(document).ready(function () {
    update_unread_num();
});

function update_unread_num() {
    var unread_num = $('.emails-wrapper #list-tab .list-group-item.unread').length;    
    console.log('unread_num = ' + unread_num);
    
    if(unread_num) {
    $('ul.sidebar li.nav-item.active a.nav-link span.badge').html(unread_num);    
    $('ul.sidebar li.nav-item.active a.nav-link span.badge').removeClass('d-none').addClass('d-inline');
    }
}

$('#list-tab a').on('click', function (e) {
    if (!customer_id || !$(this).hasClass('unread')) {
        return;
    }
    $(this).removeClass('unread');
    update_unread_num();
    
    var email_id = $(this).data('email-id');
    var action = 1;//1: read, 2: deleted
    $.ajax({
        type: "POST",
        url: base_url() + 'api/email_action',
        data: {'customer_id': customer_id, 'email_id': email_id, 'action': action},
        dataType: "json",
        success: function (resp) {
//                console.log(resp);
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
            alert('Error - ' + errorMessage);
        }
    });
});

$('#nav-tabContent .btn-delete').on('click', function (e) {
    if (!customer_id) {
        return;
    }
    var email_id = $(this).closest('.tab-pane').data('email-id');
    console.log('email_id = ' + email_id);
    $(".email-wrapper .tab-pane[data-email-id='" + email_id + "']").remove();
    $(".emails-wrapper .list-group-item[data-email-id='" + email_id + "']").next('.list-group-item').tab('show');
    $(".emails-wrapper .list-group-item[data-email-id='" + email_id + "']").remove();
    
    update_unread_num();

    var action = 2;//1: read, 2: deleted
    $.ajax({
        type: "POST",
        url: base_url() + 'api/email_action',
        data: {'customer_id': customer_id, 'email_id': email_id, 'action': action},
        dataType: "json",
        success: function (resp) {
//                console.log(resp);
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText + ", Error: " + error;
            alert('Error - ' + errorMessage);
        }
    });

});