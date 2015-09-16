<?php namespace Modules\Car\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Color extends Model {

    protected $table = 'colors';

    protected $fillable = ['name'];

    public function car() {
        return $this->hasMany('Modules\Car\Entities\Car');
    }

}