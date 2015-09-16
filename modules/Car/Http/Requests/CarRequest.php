<?php namespace Modules\Car\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'brand_id' => 'required',
			'prototype_id' => 'required',
			'color_id' => 'required',
			'condition_id' => 'required',
			'sheet_number' => 'required|size:7',
			'quantity_km' => 'required|numeric',
			'price_by_hour' => 'required|numeric'
		];
	}

}
