jQuery(document).ready(function($) {
    var $languages = {
        'fr' : '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json',
        'en' : ''
    }


    var table = $('#entries').DataTable({
        language: {
            "url": $languages[document.documentElement.lang]
        },
        ajax: '/api/entries',
        processing: true,
        columns: [
            {'data': 'id'},
            {'data': 'created_at'},
            {'data': 'firstname'},
            {'data': 'lastname'},
            {'data': 'email'},
            {'data': 'province'},
            {'data': 'birthday'},
            {'data': 'language'},
        ],
        iDisplayLength: 20,
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        columnDefs: [
            {
                "targets": 'invisible',
                "visible": false,
            },
        ],
        order: [[ 0, "desc" ]],
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'copy',
            },
            {
                extend: 'csv',

            },
            {
                extend: 'excel',
            },
            {
                extend: 'print',
            },
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRow,
                type: ''
            }
        },
        initComplete: function () {
            this.api().columns( '.select-filter' ).every( function () {
                var column = this;
                var select = $('<select><option value="">All</option><option value="Y">Yes</option><option value="N">No</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
            } );

            this.api().columns( '.text-filter' ).every( function (index) {
                var that = this;
                var input = $('<input type="text" />')
                    .appendTo( $(that.footer()).empty() )
                    .on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
            } );
        }
    });


} );