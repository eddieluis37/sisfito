<?php namespace Modules\Car\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Condition extends Model {

    protected $table = 'conditions';

    protected $fillable = ['name'];

    public function car() {
        return $this->hasMany('Modules\Car\Entities\Car');
    }

}