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
			'default': 'Bir excel dosyasını buraya sürükleyip bırakın veya tıklayın.',
			'replace': 'Değiştirmek için sürükleyin ve bırakın veya tıklayın.',
			'remove': 'Kaldır',
			'error': 'Hata! Yükleme işlemi sırasında bir hata oluştu.'
		},
		error: {
			'fileSize': 'Dosya boyutu çok büyük (maksimum 2M olmalıdır).'
		}
	});
		
	// ______________Dragable cards
	// sortable
	/*$(".sortable").sortable({
		connectWith: '.sortable',
		items: '.card-draggable',
		revert: true,
		placeholder: 'card-draggable-placeholder',
		forcePlaceholderSize: true,
		opacity: 0.77,
		cursor: 'move'
	});*/
});