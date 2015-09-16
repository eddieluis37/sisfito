<?php namespace Modules\Agreement\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agreement extends Model {

    protected $table = 'agreements';

    protected $fillable = [
        'code',
        'client_id',
        'car_id',
        'status_id',
        'registration_date',
        'delivery_date',
        'cash'
    ];

    public function car() {
        return $this->belongsTo('Modules\Car\Entities\Car', 'car_id');
    }

    public function status() {
        return $this->belongsTo('Modules\Agreement\Entities\AgreementStatus', 'status_id');
    }

    public function client() {
        return $this->belongsTo('Modules\Client\Entities\Client', 'client_id');
    }

    public static function getAgreementById($id) {

        return DB::table('agreements')
            ->join('status', 'agreements.status_id', '=', 'status.id')
            ->join('clients', 'agreements.client_id', '=', 'clients.id')
            ->join('Seccionales', 'clients.Seccionales_id', '=', 'Seccionales.id')
            ->join('cars', 'agreements.car_id', '=', 'cars.id')
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->join('prototypes', 'cars.prototype_id', '=', 'prototypes.id')
            ->join('colors', 'cars.color_id', '=', 'colors.id')
            ->where('agreements.id', '=', $id)
            ->select('code', 'status.name as status','clients.firstname', 'clients.lastname', 'clients.passport',
                    'Seccionales.name as country', 'registration_date', 'delivery_date', 'cash', 'brands.name as brand',
                    'prototypes.name as model', 'colors.name as color')
            ->get();

    }

}