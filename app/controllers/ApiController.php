<?php

class ApiController extends BaseController {

	/*
	 *	If auction started - then will return that status is "live"
	 *	If auction is not started - will return that status is "next"
	 */
	public function getAuction()
	{
		$now = date('Y-m-d H:i:s');

		$auction = Auction::orderBy('start', 'asc')
							-> where('status', '=', 'active')
							-> first();

		$products_in_auction = array();

		if ( is_object($auction) )
		{
			$index_of_auction_products = json_decode( urldecode( $auction -> products ) );

			$products_in_auction_raw = DB::select('SELECT products.*, images.images FROM products
										INNER JOIN images
										ON products.image_id = images.id
										AND products.auction_id = ?
										AND products.type = ?', array( $auction -> id, 'auction' ));

			if ( is_array( $products_in_auction_raw ) && count( $products_in_auction_raw ) > 0 )
			{
				if ( is_array( $index_of_auction_products ) && count( $index_of_auction_products ) > 0 )
				{
					foreach ( $index_of_auction_products as $index )
					{
						foreach( $products_in_auction_raw as $key => $product )
						{
							if ( $product -> id == $index )
							{
								$products_in_auction[] = $product;
								unset( $products_in_auction_raw[$key] );
							}
						}
					}
					if ( count($products_in_auction_raw) > 0 )
					{
						foreach( $products_in_auction_raw as $product )
						{
							$products_in_auction[] = $product;
						}
					}
				}
				else
				{
					$products_in_auction = $products_in_auction_raw;
				}
			}

			$products_in_auction = add_excerpt_to_products_array( $products_in_auction );
			$products_in_auction = add_thumbnail_to_products_array( $products_in_auction );

			$auction = $auction -> toArray();

			$error_code = 0;

			if ( $auction['start'] > $now ) {
				$auction = array();
				$products_in_auction = array();
				$status = 'live';
			} else {
				$status = 'next';
			}
		} else {
			$auction = array();
			$status = '';
			$error_code = 500; // there is no active auction
		}

		$obj = array(
				'auction' => $auction,
				'products' => $products_in_auction,
				'currency' => Product::get_currency_symbol(),
				'status' => $status,
				'error_code' => $error_code
				);

		return Response::json( $obj );

	}


	/*
	 *	Funciton return status of all products in auction.
	 *	Which products already in history and which are not
	 */
	function getLiveauction()
	{

	}

}
