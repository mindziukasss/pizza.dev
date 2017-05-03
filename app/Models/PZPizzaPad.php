<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:11 PM
 */

namespace App\Models;


class PZPizzaPad extends PZBaseModel
{
    protected $table = 'pz_pizzaPad';

    protected $fillable = ['id', 'name', 'calorie'];

}