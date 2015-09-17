<?php namespace Modules\Client\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = 'clients';

    protected $fillable = [
        'firstname',
        'lastname',
        'identificacion',
        'importador',
        'exportador',
        'productor',
        'seccionales_id'
    ];

    public function seccional() {
        return $this->belongsTo('Modules\Client\Entities\Seccional', 'seccionales_id');
    }

}