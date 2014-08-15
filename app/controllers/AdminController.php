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

		$products = Product::all();
		$products_list = array();

		// I need to add excerpt to outcoming array
		foreach ( $products as $product) {
			$product['excerpt'] = trim_words($product['description']);

			$image = Image::find( $product['image_id'] );
			if ( is_object( $image ) && $image -> images ) {
				$image = json_decode($image -> images);
				$product['thumbnail'] = $image -> medium;
			}

			$products_list[] = $product;
		}

		return View::make('admin.products', $this -> data ) -> with('products', $products_list);
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
	public function getAuction()
	{

		$this -> data['title'] = 'Auction';
		$this -> data['title_icon'] = 'fa-legal';
		$this -> data['active'] = 'auction';

		return View::make('admin/auction', $this -> data );
	}

}
