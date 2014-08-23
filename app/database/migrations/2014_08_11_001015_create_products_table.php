<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function( $table ){
			$table -> increments('id');
			$table -> string('name'); // VARCHAR(255)
			$table -> text('description'); // TEXT
			$table -> enum('type', array('simple', 'auction'));
			$table -> enum('status', array('draft', 'publish', 'hidden'));
			$table -> enum('auction_status', array('active', 'ended'));
			$table -> integer('auction_sum_time');
			$table -> string('lang'); // VARCHAR(255)
			$table -> float('price');
			$table -> float('sale_price');
			$table -> float('opening_bid');
			$table -> integer('auction_id') -> references('id') -> on('auctions');
			$table -> integer('parent_id');
			$table -> timestamps();
		});

		Schema::table('bids', function($table){
			$table -> integer('product_id') -> references('id') -> on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bids', function($table){
			$table -> dropForeign('bids_product_id_foreign');
			$table -> dropColumn('product_id');
		});
		Schema::drop('products');
	}

}
