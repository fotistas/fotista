$(document).ready(function(){

	$('#upload-thumbnail').click(function(e){
		e.preventDefault();
		$('#thumbnail').click();
	});

	$('#product-type').on('change', function() {
		var type = this.value;
		if ( type == 'auction' ) {
			$('.simple-product-field').each(function(){
				$( this ).hide();
			});
			$('.auction-field').each(function(){
				$( this ).show();
			});
		} else if ( type == 'simple' ) {
			$('.simple-product-field').each(function(){
				$( this ).show();
			});
			$('.auction-field').each(function(){
				$( this ).hide();
			});
		}
	});

});

$( document ).on('change','#thumbnail' , function(){
	console.log( $('#thumbnail') );
});



