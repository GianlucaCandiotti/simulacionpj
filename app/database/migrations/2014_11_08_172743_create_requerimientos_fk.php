<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosFk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('requerimientos', function(Blueprint $table) {
			$table->foreign('estado_id')->references('id')->on('estado')
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
		Schema::table('requerimientos', function(Blueprint $table) {
			$table->dropForeign('requerimientos_estado_id_foreign');
		});
	}

}
