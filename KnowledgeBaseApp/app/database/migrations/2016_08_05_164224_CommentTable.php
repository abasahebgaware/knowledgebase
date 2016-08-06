<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table)
		{
			$table->increments('c_id');
			$table->string('comment',350);
			
			$table->integer('p_id')->unsigned();
			$table->integer('u_id')->unsigned();
			$table->foreign('p_id')->references('p_id')->on('post');
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
