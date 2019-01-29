$(function(e) {
	'use strict';
	$('#example_category').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
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

	$('#example_product').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
		order: [[ 3, "desc" ]],
		aoColumns: [
			null,
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

	$('#example_customer').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
		order: [[ 4, "desc" ]],
		aoColumns: [
			null,
			null,
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

	$('#example_stock').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
		order: [[ 7, "desc" ]],
		aoColumns: [
			null,
			null,
			null,
			null,
			{ "bSortable": false },
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

	$('#example_invoice').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
		order: [[ 5, "desc" ]],
		aoColumns: [
			null,
			null,
			null,
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

	$('#example_user').DataTable({
		language:{
			url: site_url + "/public/js/datatable-turkish.json"
		},
		order: [[ 3, "desc" ]],
		aoColumns: [
			null,
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