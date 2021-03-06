$(document).ready( function () {

    /**
     * Generate datatable with options
     * @author Thaís Oliveira
     * @since 07/2018
     */
    $('#tableList').DataTable({
        pageLength: 25,
        responsive: true,
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 4 }
        ],
        "order": [[ 1, "asc" ]]
    });

} );