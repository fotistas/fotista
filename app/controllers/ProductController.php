<?php

class ProductController extends BaseController {
	
	public function getIndex()
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		$products = Product::all();

		// I need to add excerpt and thumbnail to outcoming array
		foreach ( $products as $product) {
			$product['excerpt'] = trim_words( $product['description'] );

			$image = Image::find( $product['image_id'] );
			if ( is_object( $image ) && $image -> images ) {
				$image = json_decode($image -> images);
				$product['thumbnail'] = $image -> medium;
			}
			$products_list[] = $product;
		}

		return View::make('store', $this -> data) -> with('products', $products_list);
	}
}
