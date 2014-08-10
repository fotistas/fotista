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
			$table -> increment('id');
			$table -> string('name'); // VARCHAR(255)
			$table -> text('description'); // TEXT
			$table -> enum('type', array('simple', 'auction'));
			$table -> float('price');
			$table -> float('salep_price');
			$table -> float('opening_bid');
			$table -> string('picture'); // VARCHAR(255)
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
		Schema::drop('products');
	}

}
