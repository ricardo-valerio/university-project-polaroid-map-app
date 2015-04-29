$(document).ready(function() {

	$('#mapToggle').on('click', function(event) {

		event.preventDefault();

		$("#segundaDiv").fadeToggle(0, function() {
			$("#primeiraDiv").toggleClass("large-uncentered")
		});

		console.log("scorpion");
	});


});
