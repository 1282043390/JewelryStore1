<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addrea';
    protected $primaryKey = 'address_id';
    protected $guraded = [];

    public function name($id){
        $name = Area::select('name')->find($id);
        return $name['name'];
    }
    public function getProvinceAttribute($value){
        $name = $this->name($value);
        return $name;
    }

    public function getCityAttribute($value){
        $name = $this->name($value);
        return $name;
    }
    public function getAreaAttribute($value){
        $name = $this->name($value);
        return $name;
    }
}
