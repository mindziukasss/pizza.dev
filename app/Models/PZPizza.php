<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:11 PM
 */

namespace App\BaseModels;


class PZPizza extends PZBaseModel
{
    protected $table = 'pz_cheese';

    protected $fillable = ['id', 'name', 'chees_id', 'pizzpad_id', 'client_id', 'comment'];
}