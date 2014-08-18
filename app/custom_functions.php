<?php

/*
 *	Trimming text to short excerpt
 *	@param $text - text to be trimmed
 *	@param $limit - how many words to be in excerpt
 */
function trim_words ( $text, $limit = 20)
{
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}

	return $text;
}


/*
 *	Function is adding 'thumbnail' to each product object in array
 *	@param $products - array of product objects
 *	@param $size - size name that should be taken from array of images
 */
function add_thumbnail_to_products_array( $products, $size = 'medium' )
{
	$output_products = array();

	foreach ( $products as $product) {
		$product = (array) $product;

		if ( array_key_exists( 'images', $product ) && $product['images'] ) {
			$image = json_decode( $product['images'] );
			$product['thumbnail'] = $image -> $size;
		} else {
			$product['thumbnail'] = '';
		}

		$output_products[] = (object) $product;
	}

	return $output_products;
}