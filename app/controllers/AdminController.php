<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		$this -> data['title'] = 'Home';
		$this -> data['title_icon'] = 'fa-dashboard';
		$this -> data['active'] = 'home';

		return View::make('admin.home', $this -> data );
	}

	/*---------------------------------------------------------*/

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
			$this -> data['thumbnail'] = '';

			$product = (object) array( 'id' => '' );
		} else {
			$this -> data['subtitle'] = 'Edit product';
			$this -> data['method'] = 'PUT';

			$product = Product::find($id);
			$this -> data['type'] = $product -> type;

			$image = Image::find( $product -> image_id );
			if ( is_object( $image ) && $image -> images ) {
				$picture = json_decode( $image -> images );
				$this -> data['thumbnail'] = property_exists( $product, 'medium' ) ? $picture -> medium : $picture -> full;
			} else {
				$this -> data['thumbnail'] = '';
			}
				
		}

		return View::make('admin.product', $this -> data ) -> with( 'product', $product );
	}

	/*---------------------------------------------------------*/

	/*
	 *	Creating new product
	 */
	public function postProduct()
	{
		$product = Product::create( Input::all() );

		return Redirect::to('admin/product/' . $product->id)
					->with('message', 'Successfully created product!');
	}

	/*---------------------------------------------------------*/

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

	/*---------------------------------------------------------*/

	/*
	 *	Delete product
	 */
	public function deleteProduct( $id )
	{
		$product = Product::find($id);
		
		$product -> delete();

		return URL::to('admin/products');
	}

	/*---------------------------------------------------------*/

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

		$products = DB::select('SELECT products.*, images.images FROM products
								INNER JOIN images
								ON products.image_id = images.id');

		$products = add_excerpt_to_products_array( $products );
		$products = add_thumbnail_to_products_array( $products );

		return View::make('admin.products', $this -> data ) -> with('products', $products);
	}

	/*---------------------------------------------------------*/

	/*
	 *	Handling product image upload
	 */
	public function postUpload( $id )
	{
		$file = Input::file('file');
		$destinationPath = public_path() . '/uploads';
		$extension = $file -> getClientOriginalExtension();
		$filename_random = str_random(12);
		$filename = $filename_random . '.'.$extension;
		$mime_type = $file -> getMimeType();

		
		if ( $extension !== 'gif' && $extension !== 'jpeg' && $extension !== 'jpg' && $extension !== 'png') {
			return Redirect::to('admin/product/' . $id)
					->with('message', $extension . ' - this image type is not supported!');
		}

		$upload_success = Input::file('file')->move($destinationPath, $filename);

		$file_sizes = array(
				'medium' => 300
			);

		if( $upload_success ) {
			// success
			// return Response::json('success', 200);

			$images_list['full'] = URL::to('uploads/') . '/' . $filename;

			foreach ($file_sizes as $size_name => $size) {
				$image_path = $destinationPath .'/'. $filename;
				list($width_orig, $height_orig) = getimagesize( $image_path );
				$ratio = $width_orig / $height_orig;

				if ( $size < $width_orig ) {
					$width_new = $size;
					$height_new = $size / $ratio;
					$canvas = imagecreatetruecolor($width_new, $height_new);
					switch ($extension) {
						case 'jpg':
						case 'jpeg':
							$image_orig = imagecreatefromjpeg( $image_path );
							break;
						case 'gif':
							$image_orig = imagecreatefromgif( $image_path );
							break;
						case 'png':
							$image_orig = imagecreatefrompng( $image_path );
							break;
					}
					imagecopyresampled($canvas, $image_orig, 0, 0, 0, 0, $width_new, $height_new, $width_orig, $height_orig);
					$new_image_path = $destinationPath .'/'. $filename_random . '_' . $size_name;
					switch ($extension) {
						case 'jpg':
							$new_image_path .= '.jpg';
							imagejpeg($canvas, $new_image_path);
							break;
						case 'jpeg':
							$new_image_path .= '.jpeg';
							imagejpeg($canvas, $new_image_path);
							break;
						case 'gif':
							$new_image_path .= '.gif';
							imagegif($canvas, $new_image_path);
							break;
						case 'png':
							$new_image_path .= '.png';
							imagepng($canvas, $new_image_path);
							break;
					}
					$images_list[$size_name] = URL::to('uploads/') . '/' . $filename_random . '_' . $size_name . '.' . $extension;
				}
			}

			$images = new Image;
			$images -> images = json_encode( $images_list );
			$images -> save();

			$product = Product::find( $id );
			$product -> image_id = $images->id;
			$product -> save();

			// ToDo: It is not good solution, because if user make changes in text and then upload image without saving first, he will los all text changes
			return Redirect::to('admin/product/' . $id)
					->with('message', 'Successfully uploaded image');
		} else {
			return Response::json('error', 400);
		}
	}


	/*---------------------------------------------------------*/
	/*--------------------> Auction <---------------------------*/


	/*
	 * Get Auction page
	 */
	public function getAuction( $id = 0 )
	{

		$this -> data['title'] = 'Auction';
		$this -> data['title_icon'] = 'fa-legal';
		$this -> data['active'] = 'auction';

		if ( $id == 0 ) {
			$this -> data['subtitle'] = 'Add new auction';
			$this -> data['method'] = 'POST';

			$auction = (object) array( 'id' => '' );
			$products_in_auction_raw = '';
		} else {
			$this -> data['subtitle'] = 'Edit auction';
			$this -> data['method'] = 'PUT';

			$auction = Auction::find( $id );
			$index_of_auction_products = json_decode( urldecode( $auction['products'] ) );

			$products_in_auction_raw = DB::select('SELECT products.*, images.images FROM products
										INNER JOIN images
										ON products.image_id = images.id
										AND products.auction_id = ?
										AND products.type = ?', array($id, 'auction'));
		}

		$available_products = DB::select('SELECT products.*, images.images FROM products
								INNER JOIN images
								ON products.image_id = images.id
								AND products.auction_id = 0
								AND products.type = ?', array('auction'));

		$available_list = array();

		$available_list = add_thumbnail_to_products_array( $available_products );

		$products_in_auction = array();

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

		$products_in_auction = add_thumbnail_to_products_array( $products_in_auction );

		return View::make('admin/auction', $this -> data )
				-> with( 'available_list', $available_list )
				-> with( 'products_in_auction', $products_in_auction )
				-> with( 'auction', $auction );
	}


	/*
	 * Create New Auction in database
	 */
	public function postAuction()
	{
		$post = Input::all();
		
		$auction = Auction::create( $post );

		return Redirect::to('admin/auction/' . $auction->id)
					->with('message', 'Successfully created auction!');
	}

	/*
	 * Update Auction in database
	 */
	public function putAuction( $id )
	{
		$put = Input::all();

		
		$auction = Auction::find( $id );
		// for some reason update() is not working here

		$auction -> products = $put['products'];
		$auction -> start = $put['start'];
		$auction -> save();

		$products_in_auction = json_decode( urldecode( $put['products'] ) );

		foreach( $products_in_auction as $product_id ) {

			$product = Product::find( $product_id );
			$product -> auction_id = $id;
			$product -> save();

		}

		return Redirect::to('admin/auction/' . $auction->id)
					->with('message', 'Successfully updated auction!');
	}

	/*
	 *	Get all auctions
	 */
	public function getAuctions()
	{
		$this -> data['title'] = 'Auction';
		$this -> data['title_icon'] = 'fa-legal';
		$this -> data['active'] = 'auction';

		$auctions = DB::select('SELECT * FROM auctions');
		$auctions_list = array();

		foreach( $auctions as $auction ) {
			$auction = (array) $auction;

			$auction['excerpt'] = trim_words($auction['description']);

			$index_of_auction_products = json_decode( urldecode( $auction['products'] ) );
			$products_in_auction = array();

			if ( is_array( $index_of_auction_products ) && count( $index_of_auction_products ) > 0 )
			{
				$products_in_auction = Product::whereIn('id', $index_of_auction_products) -> get();
			}

			if ( is_object($products_in_auction) )
			{
				$auction['products'] = $products_in_auction;
			}
			else
			{
				$auction['products'] = array();	
			}

			$auctions_list[] = (object) $auction;
		}

		return View::make('admin/auctions', $this -> data )
				-> with( 'auctions', $auctions_list );
	}

}
