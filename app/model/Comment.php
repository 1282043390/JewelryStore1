<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'c_id';
    protected $guraded = [];
}
