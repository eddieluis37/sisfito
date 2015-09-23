<?php namespace Modules\Client\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {

    protected $table = 'clients';
    use SoftDeletes;

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