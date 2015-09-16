<?php namespace Modules\Car\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'cars';

    protected $fillable = [
        'brand_id',
        'prototype_id',
        'color_id',
        'condition_id',
        'sheet_number',
        'quantity_km',
        'price_by_hour'
    ];

    public function brand() {
        return $this->belongsTo('Modules\Car\Entities\Brand', 'brand_id');
    }

    public function prototype() {
        return $this->belongsTo('Modules\Car\Entities\Prototype', 'prototype_id');
    }

    public function color() {
        return $this->belongsTo('Modules\Car\Entities\Color', 'color_id');
    }

    public function condition() {
        return $this->belongsTo('Modules\Car\Entities\Condition', 'condition_id');
    }

}