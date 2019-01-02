$(function() {
	'use strict';
	
	// ______________Date picker
	$('.datepicker').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true
	});
	
	// ______________File Uploads
	$('.dropify').dropify({
		messages: {
			'default': 'Drag and drop a file here or click',
			'replace': 'Drag and drop or click to replace',
			'remove': 'Remove',
			'error': 'Ooops, something wrong appended.'
		},
		error: {
			'fileSize': 'The file size is too big (2M max).'
		}
	});
		
	// ______________Dragable cards
	// sortable
	$(".sortable").sortable({
		connectWith: '.sortable',
		items: '.card-draggable',
		revert: true,
		placeholder: 'card-draggable-placeholder',
		forcePlaceholderSize: true,
		opacity: 0.77,
		cursor: 'move'
	});
});