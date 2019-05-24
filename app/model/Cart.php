<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cate_id';
    protected $guraded = [];
}
