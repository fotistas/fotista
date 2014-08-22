<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auctions', function( $table ){
			$table -> increments('id');
			$table -> string('name'); // VARCHAR(255)
			$table -> text('products');
			$table -> dateTime('start');
			$table -> enum('status', array('active', 'ended'));
			$table -> integer('enter_prod_time'); // time in seconds for product just entered auction
			$table -> integer('after_bid_time'); // additional time in seconds after new bid
			$table -> text('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auctions');
	}

}
