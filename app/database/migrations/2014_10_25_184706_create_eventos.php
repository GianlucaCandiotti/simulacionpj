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
			$table->decimal('time_A', 8, 2);
			$table->decimal('time_S1', 8, 2);
			$table->decimal('time_S2', 8, 2);
			$table->tinyInteger('next_req_to_A')->default(0);
			$table->tinyInteger('next_req_to_S1')->default(0);
			$table->tinyInteger('next_req_to_S2')->default(0);
			$table->integer('req_sistema');
			$table->integer('req_cola1');
			$table->integer('req_cola2');
			$table->integer('util_s1_flag');
			$table->integer('util_s2_flag');
			$table->decimal('util_s1', 5, 2);
			$table->decimal('util_s2', 5, 2);
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
