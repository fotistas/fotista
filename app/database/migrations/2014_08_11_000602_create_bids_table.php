<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bids', function( $table ){
			$table -> increments('id');
			// $table -> integer('product_id'); //-> I will add it with creating of products table
			// $table -> integer('user_id'); //-> I will add it with creating of users table
			$table -> float('bid');
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bids');
	}

}
