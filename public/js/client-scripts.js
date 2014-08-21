$('#contact-us-link').click(function(e){
	e.preventDefault();
	$('#contact-form-container').fadeToggle();
});

$('#contact-form-container .close').click(function(e){
	e.preventDefault();
	$('#contact-form-container').fadeToggle();
});