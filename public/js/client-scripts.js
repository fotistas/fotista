$('#contact-us-link').click(function(e){
	e.preventDefault();
	$('#contact-form-container').fadeToggle();
});

$('#contact-form-container .close').click(function(e){
	e.preventDefault();
	$('#contact-form-container').fadeToggle();
});

if ( $('#top-slider').length ) {
	$('#top-slider').flexslider({
		controlNav: false,
		slideshowSpeed: 6000,
	});	
}

$('#open-auction-started').click(function(e){
	e.preventDefault();

	var url = $(this).attr('href');
	newwindow=window.open(url,'Live Auction','height=905, width=905, location=no, menubar=no, directories=no, titlebar=no, toolbar=no');
    if (window.focus) {newwindow.focus()}
    
});