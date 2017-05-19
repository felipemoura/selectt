
$(document).ready(function() {
    $('#techniquesTable').DataTable( {
    	"order": [[ 0, "asc" ]],
    	stateSave: true,
    	"pagingType": "full_numbers",
    	responsive: true,
        processing: true,

        initComplete: function () {
        	var count = 0;
	        this.api().columns([0,2,3]).every( function () {
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
