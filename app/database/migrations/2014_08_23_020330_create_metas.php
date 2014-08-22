<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metas', function( $table ){
			$table -> increments('id');
			$table -> integer('parent_id');
			$table -> enum('parent', array('product', 'auction'));	// it could be meta for products or for auctions or for posts
			$table -> string('meta_name');
			$table -> text('meta_value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metas');
	}

}
