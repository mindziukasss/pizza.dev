<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:11 PM
 */

namespace App\Models;


class PZPizza extends PZBaseModel
{
    protected $table = 'pz_pizza';

    protected $fillable = ['id', 'name', 'chees_id', 'pizzpad_id', 'client_id', 'comment'];

    public function clients()
    {
        return $this->hasMany(PZClients::class, 'id', 'client_id');

    }

    public function pizzapad()
    {
        return $this->hasOne(PZPizzaPad::class, 'id', 'pizzpad_id');
    }

    public function cheese()
    {
        return $this->hasOne( PZCheese::class, 'id', 'chees_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(PZIngredients::class, 'pz_connections_ingredients_pizza',
            'pizza_id', 'ingredients_id');
    }

}