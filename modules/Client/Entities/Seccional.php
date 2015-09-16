<?php namespace Modules\Client\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Seccional extends Model {

    protected $table = 'seccionales';

    protected $fillable = ['name'];

    public function client() {
        return $this->hasMany('Modules\Client\Entities\Client');
    }

}