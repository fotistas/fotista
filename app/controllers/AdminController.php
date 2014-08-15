<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		$this -> data['title'] = 'Home';
		$this -> data['title_icon'] = 'fa-dashboard';
		$this -> data['active'] = 'home';

		return View::make('admin.home', $this -> data );
	}

	/*
	 *	Get existing product
	 */
	public function getProduct($id = 0)
	{
		$this -> data['title'] = 'Products';
		$this -> data['title_icon'] = 'fa-shopping-cart';
		$this -> data['active'] = 'products';

		if ( $id == 0 ) {
			$this -> data['subtitle'] = 'Add new product';
			$this -> data['method'] = 'POST';
			$this -> data['type'] = 'simple';

			$product = (object) array( 'id' => '' );
		} else {
			$this -> data['subtitle'] = 'Edit product';
			$this -> data['method'] = 'PUT';

			$product = Product::find($id);
			$this -> data['type'] = $product -> type;
		}

		return View::make('admin.product', $this -> data ) -> with( 'product', $product );
	}

	/*
	 *	Creating new product
	 */
	public function postProduct()
	{
		$product = Product::create( Input::all() );

		return Redirect::to('admin/product/' . $product->id)
					->with('message', 'Successfully created product!');
	}

	/*
	 *	Update existing product
	 */
	public function putProduct( $id )
	{
		$product = Product::find($id);

		$product -> update(Input::all());

		return Redirect::to('admin/product/' . $product->id)
					->with('message', 'Successfully updated product!');
	}

	/*
	 *	Delete product
	 */
	public function deleteProduct( $id )
	{
		$product = Product::find($id);
		
		$product -> delete();

		return URL::to('admin/products');
	}

	/*
	 *	Get list of all products
	 */
	public function getProducts( $message = '' )
	{
		$this -> data['title'] = 'Products';
		$this -> data['title_icon'] = 'fa-shopping-cart';
		$this -> data['active'] = 'products';
		$this -> data['currency'] = Product::get_currency_symbol();

		if( $message != '' ) Session::put('message', $message);
			else Session::put('message', 'false');

		$products = Product::all();
		$products_list = array();
		// I need to add excerpt to outcoming array
		foreach ( $products as $product) {
			$limit = 20; // keep only first 20 words
			if (str_word_count($product['description'], 0) > $limit) {
				$words = str_word_count($product['description'], 2);
				$pos = array_keys($words);
				$text = substr($product['description'], 0, $pos[$limit]) . '...';
			} else {
				$text = $product['description'];
			}
			$product['excerpt'] = $text;
			$products_list[] = $product;
		}

		return View::make('admin.products', $this -> data ) -> with('products', $products_list);
	}

}
