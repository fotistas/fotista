$(document).ready(function(){

	var product_type = $('#type').val();

	$('#upload-thumbnail').click(function(e){
		e.preventDefault();
		$('#thumbnail').click();
	});

	$('#type').on('change', function() {
		product_type = this.value;
		change_view_by_type( product_type );
	});

	change_view_by_type( product_type );


	$( '#save_product' ).click(function(){
		console.log( 'save product' );
	});


});

function change_view_by_type ( product_type ) {
	if ( product_type == 'auction' ) {
		$('.simple-product-field').each(function(){
			$( this ).hide();
		});
		$('.auction-field').each(function(){
			$( this ).show();
		});
	} else if ( product_type == 'simple' ) {
		$('.simple-product-field').each(function(){
			$( this ).show();
		});
		$('.auction-field').each(function(){
			$( this ).hide();
		});
	}
}


$( document ).on('change','#thumbnail' , function(){
	console.log( $('#thumbnail') );
});








