<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:10 PM
 */

namespace App\BaseModels;


class PZConnectionsIngredientsPizza extends Model
{
    protected $table = 'pz_connections_ingredients_pizza';

    protected $fillable = ['ingredients_id', 'pizza_id'];
}