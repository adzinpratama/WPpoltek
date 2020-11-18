var path = window.location.pathname;
var host = window.location.hostname;
$(document).ready(function(){
    $('#simple-table').DataTable();
    
    setInterval(() => {
        $('#simple-table').DataTable().data.reload();
    }, 3000);
});

