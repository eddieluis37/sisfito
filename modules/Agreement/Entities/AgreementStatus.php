<?php namespace Modules\Agreement\Entities;
   
use Illuminate\Database\Eloquent\Model;

class AgreementStatus extends Model {

    protected $table = 'status';

    protected $fillable = ['name'];

    public function agreement() {
        return $this->hasMany('Modules\Agreement\Entities\Agreement');
    }

}