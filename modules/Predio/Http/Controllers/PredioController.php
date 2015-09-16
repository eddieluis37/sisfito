<?php namespace Modules\Predio\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class PredioController extends Controller {
	
	public function index()
	{
		return view('predio::index');
	}
	
}