
/*--------------- Products ---------------------*/

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
	$( '#product-form' ).submit();
});

$('#delete_product').click(function(e){
	e.preventDefault();
	var url = document.URL;
	var data = $('#product-form').serialize();
	$.ajax({
			type: "DELETE",
			url: url,
			data: data
		})
		.done(function( msg ) {
			window.location.href = msg + '/Product deleted!';
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

$( document ).on('change','#thumbnail' , function( e ){
	$( '#upload-thumbnail-form' ).submit();
});



/*--------------- Auction ---------------------*/

var auction_list = [];

/*
 *	List of products available to add to the next auction
 */
$( "#free-auctions" ).sortable({
	connectWith: ".connectedLists"
}).disableSelection();

/*
 *	List of products for the next auction
 */
$( "#auctions-list" ).sortable({
	connectWith: ".connectedLists",
	update: function( event, ui ) {
		auction_list = [];
		$(this).find( 'li' ).each(function(){
			var id = $(this).attr('id');
			id = id.replace( 'auction-', '' );
			auction_list.push( id );
		});
	}
}).disableSelection();

/*
 *	Auction date and time picker
 */
$( '#auction-start-date' ).datetimepicker({
	format:'Y-m-d H:i',
	mask: true,
});

/*
 *	Save auction data
 */
$( '#save_auction' ).click(function(){
	var auction_time = $('#auction-start-date').val() + ':00';

	if ( auction_time == '____-__-__ __:__:00' ) {
		error_message( 'Please enter correct date and time for the auction' );
		return false;
	}

	var now = new Date();
	var iso = now.toISOString().match(/(\d{4}\-\d{2}\-\d{2})T(\d{2}:\d{2}:\d{2})/)
	var now_iso = iso[1] + ' ' + iso[2];

	if (auction_time < now_iso) {
		error_message( 'Data & time of the auction are already in the past. Please pick correct one' );
		return false;
	}
	
	var data = {
			products: JSON.stringify( auction_list ),
			start: auction_time,
		};
	var url = document.URL + '/2';
	$.ajax({
			type: "PUT",
			url: url,
			data: data
		})
		.done(function( msg ) {
			if ( msg == 'success' ) {
				success_message( 'Auction saved successfully!' );
			}
		});
});

function error_message( msg ) {
	$( '#error-message' ).text( msg );
	$( '#error-message' ).slideToggle('fast');
	setTimeout(function(){
		$( '#error-message' ).slideToggle('fast')
	}, 2000);
}

function success_message( msg ) {
	$( '#success-message' ).text( msg );
	$( '#success-message' ).slideToggle('fast');
	setTimeout(function(){
		$( '#success-message' ).slideToggle('fast')
	}, 2000);
}