<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosFk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('eventos', function(Blueprint $table) {
			$table->foreign('requerimiento_id')->references('id')->on('requerimientos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		
		Schema::table('eventos', function(Blueprint $table) {
			$table->foreign('tipo_evento_id')->references('id')->on('tipo_eventos')
						->onDelete('cascade')
						->onUpdate('cascade');
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
		Schema::table('eventos', function(Blueprint $table) {
			$table->dropForeign('eventos_requerimiento_id_foreign');
		});
		Schema::table('eventos', function(Blueprint $table) {
			$table->dropForeign('eventos_tipo_evento_id_foreign');
		});
	}

}
