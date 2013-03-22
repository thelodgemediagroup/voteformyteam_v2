$(document).ready(function() {
	$(".vote-submit").click(function() {
	
		$(".num_votes").each(function() {

			if ($(this).val() != "")
			{
				return true;
			}
		});

		$("#error-msg").html('<p><b>Please enter a quantity of votes</b></p>');
		return false;
		
	});
});