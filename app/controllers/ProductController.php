<?php

class ProductController extends BaseController {
	
	public function getIndex()
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		$products = DB::select('SELECT products.*, images.images FROM products
								INNER JOIN images
								ON products.image_id = images.id
								AND products.type = ?', array('simple') );

		$products = add_excerpt_to_products_array( $products );

		$products = add_thumbnail_to_products_array( $products );

		return View::make('store', $this -> data) -> with('products', $products);
	}

	/*
	 *	Show product page
	 */
	public function getProduct( $id )
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		$product = DB::select('SELECT products.*, images.images FROM products
							INNER JOIN images
							ON products.image_id = images.id
							AND products.id = ?', array( $id ));

		$product = add_thumbnail_to_products_array( $product, 'full', 'large' );

		return View::make('product', $this -> data) -> with( 'product', $product[0] );
	}
}
