<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPzConnectionsIngredientsPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pz_connections_ingredients_pizza', function(Blueprint $table)
		{
			$table->foreign('ingredients_id', 'fk_pz_connections_ingredients_pizzaPad_cheese_pz_ingredients1')->references('id')->on('pz_ingredients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pizza_id', 'fk_pz_connections_ingredients_pizzaPad_cheese_pz_pizza1')->references('id')->on('pz_pizza')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pz_connections_ingredients_pizza', function(Blueprint $table)
		{
			$table->dropForeign('fk_pz_connections_ingredients_pizzaPad_cheese_pz_ingredients1');
			$table->dropForeign('fk_pz_connections_ingredients_pizzaPad_cheese_pz_pizza1');
		});
	}

}
