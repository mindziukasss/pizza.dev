<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:10 PM
 */

namespace App\BaseModels;


class PZCheese extends PZBaseModel
{
    protected $table = 'pz_cheese';

    protected $fillable = ['id', 'name', 'calorie'];
}