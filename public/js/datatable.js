$(function(e) {
	'use strict';
	$('#example_category').DataTable({
		order: [[ 2, "desc" ]],
		aoColumns: [
			null,
			null,
			null,
			{ "bSortable": false },
			{ "bSortable": false }
		],
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal({
					header: function(row) {
						var data = row.data();
						return 'Details for ' + data[0] + ' ' + data[1];
					}
				}),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll({
					tableClass: 'table'
				})
			}
		}
	});
});