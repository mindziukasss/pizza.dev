<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_pizza', function(Blueprint $table)
		{
			$table->foreign('chees_id', 'fk_pz_pizza_pz_cheese1')->references('id')->on('pz_cheese')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('client_id', 'fk_pz_pizza_pz_clients1')->references('id')->on('pz_clients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pizzpad_id', 'fk_pz_pizza_pz_pizzaPad1')->references('id')->on('pz_pizzaPad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_pizza', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_pizza_pz_cheese1');
			$table->dropForeign('fk_pz_pizza_pz_clients1');
			$table->dropForeign('fk_pz_pizza_pz_pizzaPad1');
		});
	}

}
