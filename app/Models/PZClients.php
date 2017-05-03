<?php
/**
 * Created by PhpStorm.
 * User: Code Academy
 * Date: 5/3/2017
 * Time: 1:10 PM
 */

namespace App\Models;


class PZClients extends PZBaseModel
{
    protected $table = 'pz_clients';

    protected $fillable = ['id', 'phone_nr', 'address'];

}