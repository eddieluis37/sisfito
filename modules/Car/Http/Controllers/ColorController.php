<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Color;
use Modules\Car\Http\Requests\ColorRequest;
use Pingpong\Modules\Routing\Controller;

class ColorController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-colors')) {

        $colors = Color::all();

		return view('car::color.index', compact('colors'));

        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-colors')) {

        return view('car::color.create');

        }

        return redirect('auth/logout');
    }

    public function store(ColorRequest $request) {

        if(Auth::user()->can('create-colors')) {

        $data = Color::create($request->all());

        $color = Color::findOrFail($data->id);

        Session::flash('message', trans('car::ui.color.message_create', array('name' => $color->name)));

        return redirect('car/color/create');

        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-colors')) {

        $color = Color::findOrFail($id);

        return view('car::color.edit', compact('color'));

        }

        return redirect('auth/logout');
    }

    public function update($id, ColorRequest $request) {

        if(Auth::user()->can('update-colors')) {

        $color = Color::findOrFail($id);

        $color->update($request->all());

        Session::flash('message', trans('car::ui.color.message_update', array('name' => $color->name)));

        return redirect('car/color');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-colors')) {

        $color = Color::findOrFail($id);

        Color::destroy($id);

        Session::flash('message', trans('car::ui.color.message_delete', array('name' => $color->name)));

        return redirect('car/color');

        }

        return redirect('auth/logout');
    }
	
}