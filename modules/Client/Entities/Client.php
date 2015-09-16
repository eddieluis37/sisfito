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
        'Seccionales_id'
    ];

    public function seccional() {
        return $this->belongsTo('Modules\Client\Entities\Seccional', 'Seccionales_id');
    }

}