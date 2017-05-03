<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:24 PM
 */

namespace App\BaseModels;


class PZIngredients extends PZBaseModel
{

    protected $table = 'pz_ingredients';

    protected $filable = ['id', 'names', 'calorie'];

}