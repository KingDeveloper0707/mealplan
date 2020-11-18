// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#dataTable_faq_comment').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
});
