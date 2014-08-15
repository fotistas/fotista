<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$this -> data['currency'] = Product::get_currency_symbol();

		// Featured Products - 4 random products
		$products = Product::orderByRaw('RAND()') -> take(4) ->get();

		// I need to add excerpt and thumbnail to outcoming array
		foreach ( $products as $product) {
			$product['excerpt'] = trim_words( $product['description'] );

			$image = Image::find( $product['image_id'] );
			if ( is_object( $image ) && $image -> images ) {
				$image = json_decode($image -> images);
				$product['thumbnail'] = $image -> medium;
			}
			$featured_products[] = $product;
		}

		// New Products - last 4 added
		$products = Product::orderBy('created_at', 'desc') -> take(4) ->get();

		// I need to add excerpt and thumbnail to outcoming array
		foreach ( $products as $product) {
			$product['excerpt'] = trim_words( $product['description'] );

			$image = Image::find( $product['image_id'] );
			if ( is_object( $image ) && $image -> images ) {
				$image = json_decode($image -> images);
				$product['thumbnail'] = $image -> medium;
			}
			$new_products[] = $product;
		}

		return View::make('home', $this -> data)
						-> with('new_products', $new_products)
						-> with('featured_products', $featured_products);
	}

}
