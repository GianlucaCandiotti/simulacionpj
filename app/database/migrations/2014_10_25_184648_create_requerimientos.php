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
			$table->decimal('T', 5, 2);
			$table->decimal('C1', 5, 2);
			$table->decimal('C2', 5, 2);
			$table->decimal('D1', 5, 2);
			$table->decimal('D2', 5, 2);
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
