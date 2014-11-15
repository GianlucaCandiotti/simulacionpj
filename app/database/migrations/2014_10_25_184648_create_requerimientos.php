<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('requerimientos', function($table){
			$table->increments('id');
			$table->decimal('T', 8, 2);
			$table->decimal('C1', 8, 2);
			$table->decimal('C2', 8, 2);
			$table->decimal('D1', 8, 2);
			$table->decimal('D2', 8, 2);
			$table->integer('estado_id')->unsigned();
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
		Schema::drop('requerimientos');
	}

}
