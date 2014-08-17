<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function( $table ){
			$table -> increments('id');
			$table -> text('images');
			$table -> timestamps();
		});

		Schema::table('products', function($table){
			$table -> integer('image_id') -> references('id') -> on('images');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
