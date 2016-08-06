<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usertable', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',70);
			$table->string('email',128)->unique();
			$table->string('password',255);
			
			$table->string('remember_token')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usertable');
	}

}
