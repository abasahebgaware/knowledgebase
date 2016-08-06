<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->increments('p_id');
			$table->string('title',150);
			$table->string('description',600);
			$table->integer('u_id')->unsigned();
			
			$table->foreign('u_id')->references('id')->on('usertable');
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
		//
	}

}
