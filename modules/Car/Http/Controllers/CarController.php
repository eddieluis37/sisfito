<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Brand;
use Modules\Car\Entities\Car;
use Modules\Car\Entities\Color;
use Modules\Car\Entities\Condition;
use Modules\Car\Entities\Prototype;
use Modules\Car\Http\Requests\CarRequest;
use Pingpong\Modules\Routing\Controller;

class CarController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-cars')) {

        $cars = Car::all();

		return view('car::index', compact('cars'));

        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-cars')) {

        $brands = Brand::orderBy('name', 'asc')->lists('name', 'id');
        $prototypes = Prototype::orderBy('name', 'asc')->lists('name', 'id');
        $colors = Color::orderBy('name', 'asc')->lists('name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');

        return view('car::create', compact('brands', 'prototypes', 'colors', 'conditions'));

        }

        return redirect('auth/logout');
    }

    public function store(CarRequest $request) {

        if(Auth::user()->can('create-cars')) {

        $data = Car::create($request->all());

        $car = Car::findOrFail($data->id);

        Session::flash('message', trans(
                'car::ui.car.message_create', array('brand' => $car->brand->name))
        );

        return redirect('car/create');

        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-cars')) {

        $car = Car::findOrFail($id);

        $brands = Brand::orderBy('name', 'asc')->lists('name', 'id');
        $prototypes = Prototype::orderBy('name', 'asc')->lists('name', 'id');
        $colors = Color::orderBy('name', 'asc')->lists('name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');

        return view('car::edit', compact('car', 'brands', 'prototypes', 'colors', 'conditions'));

        }

        return redirect('auth/logout');

    }

    public function update($id, CarRequest $request) {

        if(Auth::user()->can('update-cars')) {

        $car = Car::findOrFail($id);

        $car->update($request->all());

        Session::flash('message', trans(
                'car::ui.car.message_update', array('brand' => $car->brand->name))
        );

        return redirect('car');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-cars')) {

        $car = Car::findOrFail($id);

        Car::destroy($id);

        Session::flash('message', trans(
                'car::ui.car.message_delete', array('brand' => $car->brand->name))
        );

        return redirect('car');

        }

        return redirect('auth/logout');
    }


}