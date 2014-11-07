<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('eventos', function($table){
			$table->increments('id');
			$table->integer('event_time');
			$table->integer('req_sistema');
			$table->integer('req_cola1');
			$table->integer('req_cola2');
			$table->integer('util_s1');
			$table->integer('util_s2');
			$table->integer('requerimiento_id')->unsigned();
			$table->integer('tipo_evento_id')->unsigned();
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
		Schema::drop('eventos');
	}

}
