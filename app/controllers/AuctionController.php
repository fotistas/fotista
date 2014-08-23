<?php

class AuctionController extends BaseController {

	public function getIndex()
	{
		$this -> data['currency'] = Product::get_currency_symbol();
		$this -> data['now'] = date('Y-m-d H:i:s');

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
		} else {
			$auction = (object) array( 'start' => '' );
		}

		return View::make( 'auction', $this -> data )
			-> with( 'auction', $auction )
			-> with( 'products_in_auction', $products_in_auction );
	}


	/*
	 *	Show auction product page
	 */
	public function getProduct( $id )
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		$product = DB::select('SELECT products.*, images.images FROM products
							INNER JOIN images
							ON products.image_id = images.id
							AND products.id = ?', array( $id ));

		$product = add_thumbnail_to_products_array( $product, 'full', 'large' );

		return View::make('product', $this -> data) -> with('product', $product[0] );
	}


	/*
	 *	Show auction started page
	 */
	public function getStarted()
	{
		return View::make('auction-app');
	}

}