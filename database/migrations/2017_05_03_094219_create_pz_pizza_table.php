<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePzPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pz_pizza', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('chees_id', 36)->nullable()->index('fk_pz_pizza_pz_cheese1_idx');
			$table->string('pizzpad_id', 36)->index('fk_pz_pizza_pz_pizzaPad1_idx');
			$table->string('client_id', 36)->index('fk_pz_pizza_pz_clients1_idx');
			$table->string('comment', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pz_pizza');
	}

}
