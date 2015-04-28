$(document).ready(function() {
	$(".close").on("click", function(){ $(".alert-box").hide()})
});

$(document).ready(function() {
	setTimeout( function() {
		$('.alert-box').fadeOut("slow");
	},2000);
});
