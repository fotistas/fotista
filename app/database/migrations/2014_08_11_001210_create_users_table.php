<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function( $table ){
			$table -> increments('id');
			$table -> string('username') -> unique(); // VARCHAR(255)
			$table -> string('email'); // VARCHAR(255)
			$table -> string('password'); // VARCHAR(255)
			$table -> enum('permission', array('admin', 'customer'));
			$table -> string('first_name'); // VARCHAR(255)
			$table -> string('last_name'); // VARCHAR(255)
			$table -> string('remember_token', 100) -> nullable() -> default( NULL ); // VARCHAR(100)
			$table -> timestamps();
		});

		Schema::table('bids', function($table){
			$table -> integer('user_id') -> references('id') -> on('users');
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
			$table -> dropForeign('bids_user_id_foreign');
			$table -> dropColumn('user_id');
		});
		Schema::drop('users');
	}

}
