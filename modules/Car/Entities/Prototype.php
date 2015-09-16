<?php namespace Modules\Car\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Prototype extends Model {

    protected $table = 'prototypes';

    protected $fillable = ['name'];

    public function car() {
        return $this->hasMany('Modules\Car\Entities\Car');
    }

}