$(document).ready(function() {
	// order date picker
	$("#startDate").datepicker();
	$("#startDateM").datepicker();
	$("#startDateMk").datepicker();
	$("#startDateMiradi").datepicker();
	$("#startDateMatumizi").datepicker();
	// order date picker
	$("#endDate").datepicker();
	$("#endDateM").datepicker();
	$("#endDateMk").datepicker();
	$("#endDateMiradi").datepicker();
	$("#endDateMatumizi").datepicker();

	////////////////////////////////////DAILY CLEANLINESS
	$("#dailCleanlinessReport").unbind('submit').bind('submit', function() {
		
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();

		if(startDate == "" || endDate == "") {
			if(startDate == "") {
				$("#startDate").closest('.form-group').addClass('has-error');
				$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}

			if(endDate == "") {
				$("#endDate").closest('.form-group').addClass('has-error');
				$("#endDate").after('<p class="text-danger">The End Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'text',
				success:function(response) {
					//$("#michangoAdaReport").html(response);
					var mywindow = window.open('', 'TANRAIL INVESTMENTS LIMITED', 'height=400,width=600');
	        mywindow.document.write('<html><head><title>Daily Cleanliness Report</title>');        
	        mywindow.document.write('</head><body>');
	        mywindow.document.write(response);
	        mywindow.document.write('</body></html>');

	        mywindow.document.close(); // necessary for IE >= 10
	        mywindow.focus(); // necessary for IE >= 10

	        mywindow.print();
	        mywindow.close();
				} // /success
			});	// /ajax

		} // /else

		return false;
	});

		////////////////////////////////////VACUUM CLEANING
		$("#vacuumReportingForm").unbind('submit').bind('submit', function() {
		
			var startDateM = $("#startDateM").val();
			var endDateM = $("#endDateM").val();
	
			if(startDateM == "" || endDateM == "") {
				if(startDateM == "") {
					$("#startDateM").closest('.form-group').addClass('has-error');
					$("#startDateM").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
	
				if(endDateM == "") {
					$("#endDateM").closest('.form-group').addClass('has-error');
					$("#endDateM").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
	
				var form = $(this);
	
				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'TANRAIL INVESTMENTS LIMITED', 'height=400,width=600');
	        	mywindow.document.write('<html><head><title>Interior and Vacuum Cleanliness Report</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
	
				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10
	
				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax
	
			} // /else
	
			return false;
		});

	////////////////////////////////////FUMIGATION REPORT
	$("#fumigationReportingForm").unbind('submit').bind('submit', function() {
		
		var startDateMk = $("#startDateMk").val();
		var endDateMk = $("#endDateMk").val();
	
		if(startDateMk == "" || endDateMk == "") {
			if(startDateMk == "") {
				$("#startDateMk").closest('.form-group').addClass('has-error');
				$("#startDateMk").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
	
			if(endDateMk == "") {
				$("#endDateMk").closest('.form-group').addClass('has-error');
				$("#endDateMk").after('<p class="text-danger">The End Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();
	
			var form = $(this);
	
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'text',
				success:function(response) {
					var mywindow = window.open('', 'TANRAIL INVESTMENTS LIMITED', 'height=400,width=600');
			mywindow.document.write('<html><head><title>Fumigation Report</title>');        
			mywindow.document.write('</head><body>');
			mywindow.document.write(response);
			mywindow.document.write('</body></html>');
	
			mywindow.document.close(); // necessary for IE >= 10
			mywindow.focus(); // necessary for IE >= 10
	
			mywindow.print();
			mywindow.close();
				} // /success
			});	// /ajax
	
		} // /else
	
		return false;
	});

		////////////////////////////////////MIRADI REPORT
		$("#miradiReportForm").unbind('submit').bind('submit', function() {
		
			var startDateMiradi = $("#startDateMiradi").val();
			var endDateMiradi = $("#endDateMiradi").val();
	
			if(startDateMiradi == "" || endDateMiradi == "") {
				if(startDateMiradi == "") {
					$("#startDateMiradi").closest('.form-group').addClass('has-error');
					$("#startDateMiradi").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
	
				if(endDateMiradi == "") {
					$("#endDateMiradi").closest('.form-group').addClass('has-error');
					$("#endDateMiradi").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
	
				var form = $(this);
	
				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Best Brothers Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Ripoti ya Miradi</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
	
				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10
	
				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax
	
			} // /else
	
			return false;
		});

		////////////////////////////////////MATUMIZI REPORT
		$("#matumiziReportForm").unbind('submit').bind('submit', function() {
		
			var startDateMatumizi = $("#startDateMatumizi").val();
			var endDateMatumizi = $("#endDateMatumizi").val();
	
			if(startDateMatumizi == "" || endDateMatumizi == "") {
				if(startDateMatumizi == "") {
					$("#startDateMatumizi").closest('.form-group').addClass('has-error');
					$("#startDateMatumizi").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
	
				if(endDateMatumizi == "") {
					$("#endDateMatumizi").closest('.form-group').addClass('has-error');
					$("#endDateMatumizi").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
	
				var form = $(this);
	
				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Best Brothers Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Ripoti ya Matumizi</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
	
				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10
	
				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax
	
			} // /else
	
			return false;
		});
});