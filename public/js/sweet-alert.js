$(function() {
	'use strict';
	// Message
	$(document).on("click", "#but1", function(e){
		var message = $("#message").val();
		if (message == "") {
			message = "Your message";
		}
		swal(message);
	});
	// With message and title
	$(document).on("click", "#but2", function(e){
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "Your message";
		}
		if (title == "") {
			title = "Your message";
		}
		swal(title, message);
	});
	// Show image
	$(document).on("click", "#but3", function(e){
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "Your message";
		}
		if (title == "") {
			title = "Your message";
		}
		swal({
			title: title,
			text: message,
			imageUrl: 'assets/images/brand/logo.png'
		});
	});
	// Timer
	$(document).on("click", "#but4", function(e){
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "Your message";
		}
		if (title == "") {
			title = "Your message";
		}
		message += "(close after 2 seconds)";
		swal({
			title: title,
			text: message,
			timer: 2000,
			showConfirmButton: false
		});
	});
	//
	$(document).on("click", "#click", function(e){
		var type = $("#type").val();
		swal({
			title: "Title",
			text: "Your message",
			type: type
		});
	});
	// Prompt
	$(document).on("click", "#prompt", function(e){
		swal({
			title: "Add",
			text: "Enter your message",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			inputPlaceholder: "Your message"
		}, function(inputValue) {
			if (inputValue != "") {
				swal("Input", "You have entered : " + inputValue);
			}
		});
	});
	// Confirm
	$(document).on("click","#confirm", function(e){
		swal({
			title: "Alert",
			text: "Are you really want to exit",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});
	$(document).on("click", "#click", function(e){
		swal('Congratulations!', 'Your message has been succesfully sent', 'success');
	});
	$(document).on("click", "#click1", function(e){
		swal({
			title: "Alert",
			text: "Waring alert",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});
	$(document).on("click", "#click2", function(e){
		swal({
			title: "Alert",
			text: "Danger alert",
			type: "error",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});
	$(document).on("click", "#click3", function(e){
		swal({
			title: "Are you sure?",
			text: "Your will not be able to recover this imaginary file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false
		}, function() {
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
		});
	});
	$(document).on("click", "#click4", function(e){
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
			} else {
				swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		});
	});
	$(document).on("click","#click5", function(e){
		swal({
			title: "Sweet!",
			text: "Here's a custom image.",
			imageUrl: 'assets/img/thumbs.png'
		});
	});
	$(document).on("click", "#click7", function(e){
		swal({
			type: 'error',
			title: 'Oops...',
			text: 'Something went wrong!',
			footer: '<a href>Why do I have this issue?</a>'
		})
	});
	$(document).on("click", "#click8", function(e){
		swal({
			title: '<strong>HTML <u>example</u></strong>',
			type: 'info',
			html: 'You can use <b>bold text</b>, ' + '<a href="//spruko.com">links</a> ' + 'and other HTML tags',
			showCloseButton: true,
			showCancelButton: true,
			focusConfirm: false,
			confirmButtonText: ' Great!',
			confirmButtonAriaLabel: 'Thumbs up, great!',
			cancelButtonText: '',
			cancelButtonAriaLabel: 'Thumbs down',
		})
	});
	$(document).on("click", "#click9" , function(e){
		swal({
			title: 'Sweet!',
			text: 'Modal with a custom image.',
			imageUrl: 'assets/img/bg.jpg',
			imageWidth: 400,
			imageHeight: 200,
			imageAlt: 'Custom image',
			animation: false
		})
	});
	$(document).on("click", "#click10" , function(e){
		let timerInterval
		swal({
			title: 'Auto close alert!',
			html: 'I will close in <strong></strong> seconds.',
			timer: 2000,
			onOpen: () => {
				swal.showLoading()
				timerInterval = setInterval(() => {
					swal.getContent().querySelector('strong').textContent = swal.getTimerLeft()
				}, 100)
			},
			onClose: () => {
				clearInterval(timerInterval)
			}
		})
	});
});