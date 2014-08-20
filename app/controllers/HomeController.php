<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		// Featured Products - 4 random products
		$products = DB::select('SELECT products.*, images.images FROM products
								INNER JOIN images
								ON products.image_id = images.id
								AND products.type <> ?
								ORDER BY RAND()
								LIMIT 4', array('auction') );

		$products = add_excerpt_to_products_array( $products );
		$featured_products = add_thumbnail_to_products_array( $products );

		// New Products - last 4 added
		$products = DB::select('SELECT products.*, images.images FROM products
								INNER JOIN images
								ON products.image_id = images.id
								AND products.type <> ?
								ORDER BY created_at DESC
								LIMIT 4', array('auction') );

		$products = add_excerpt_to_products_array( $products );
		$new_products = add_thumbnail_to_products_array( $products );

		return View::make('home', $this -> data)
						-> with('featured_products', $featured_products)
						-> with('new_products', $new_products);
						
	}

}
