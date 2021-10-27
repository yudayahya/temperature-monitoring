var pool = 'default';
var table;
$(function() {
    get_data();
});

$('#pool').on('change', function() {
    pool = this.value;
    reinitializeTable();
});

function get_data() {
    $('#data-content').addClass('d-none');
    $('#loader').addClass('my-5');
    $('#loader').html(
        '<div id="loading-image" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>'
    );
    $.ajax({
        type: "GET",
        url: "/tabel/data/" + pool,
        dataType: "json",
        success: function(response) {
            table = $('#table-data').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "data": response.data,
            });
            $('#loader').html('');
            $('#loader').removeClass('my-5');
            $('#data-content').removeClass('d-none');
        },
    });
}

function reinitializeTable() {
    table.clear().destroy();
    get_data();
}
