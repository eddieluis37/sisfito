<?php namespace Modules\Car\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $table = 'brands';

    protected $fillable = ['name'];

    public function car() {
        return $this->hasMany('Modules\Car\Entities\Car');
    }

}