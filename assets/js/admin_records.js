$(document).ready(function() {
    $('#techniquesTable').DataTable(     {
    	"order": [[ 0, "asc" ]],
    	"pagingType": "full_numbers",
        "dom" : '<"col-lg-12 col-md-12 col-sm-12 col-xs-12"f>rt<"#footerTable.row"<"col-lg-3 col-md-3 col-sm-3 col-xs-3"i><"col-lg-3 col-md-3 col-sm-3 col-xs-3"l><"col-lg-6 col-md-6 col-sm-6 col-xs-6" <"pull-right">p>><"clear">',

        initComplete: function () {
        	var count = 0;
	        this.api().columns([0,1,3]).every( function () {
		        var column = this;
	            var select = $('<select><option value="">Show all</option></select>')
	                .appendTo( $(column.header()) )
	                .on( 'change', function () {
	                    var val = $.fn.dataTable.util.escapeRegex(
	                        $(this).val()
	                    );

	                    column
	                        .search( val ? '^'+val+'$' : '', true, false )
	                        .draw();
	                } );

	            column.data().unique().sort().each( function ( d, j ) {
	                select.append( '<option value="'+d+'">'+d+'</option>' )
	            } );

	        } );
	    }
    });
} );

function openModal(el) {
	$("#" + el + "myInfo").modal('show');
}