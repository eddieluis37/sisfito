<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Brand;
use Modules\Car\Http\Requests\BrandRequest;
use Pingpong\Modules\Routing\Controller;

class BrandController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-brands')) {

        $brands = Brand::all();

		return view('car::brand.index', compact('brands'));

        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-brands')) {

        return view('car::brand.create');

        }

        return redirect('auth/logout');
    }

    public function store(BrandRequest $request) {

        if(Auth::user()->can('create-brands')) {

        $data = Brand::create($request->all());

        $brand = Brand::findOrFail($data->id);

        Session::flash('message', trans('car::ui.brand.message_create', array('name' => $brand->name)));

        return redirect('car/brand/create');

        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-brands')) {

        $brand = Brand::findOrFail($id);

        return view('car::brand.edit', compact('brand'));

        }

        return redirect('auth/logout');
    }

    public function update($id, BrandRequest $request) {

        if(Auth::user()->can('update-brands')) {

        $brand = Brand::findOrFail($id);

        $brand->update($request->all());

        Session::flash('message', trans('car::ui.brand.message_update', array('name' => $brand->name)));

        return redirect('car/brand');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-brands')) {

        $brand = Brand::findOrFail($id);

        Brand::destroy($id);

        Session::flash('message', trans('car::ui.brand.message_delete', array('name' => $brand->name)));

        return redirect('car/brand');

        }

        return redirect('auth/logout');
    }
	
}