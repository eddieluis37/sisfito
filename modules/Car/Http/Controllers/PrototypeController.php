<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Prototype;
use Modules\Car\Http\Requests\PrototypeRequest;
use Pingpong\Modules\Routing\Controller;

class PrototypeController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        if(Auth::user()->can('read-prototypes')) {

        $prototypes = Prototype::all();

        return view('car::prototype.index', compact('prototypes'));

        }

        return redirect('auth/logout');
    }

    public function create() {

        if(Auth::user()->can('create-prototypes')) {

        return view('car::prototype.create');

        }

        return redirect('auth/logout');
    }

    public function store(PrototypeRequest $request) {

        if(Auth::user()->can('create-prototypes')) {

        $data = Prototype::create($request->all());

        $prototype = Prototype::findOrFail($data->id);

        Session::flash('message', trans('car::ui.prototype.message_create', array('name' => $prototype->name)));

        return redirect('car/model/create');

        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-prototypes')) {

        $prototype = Prototype::findOrFail($id);

        return view('car::prototype.edit', compact('prototype'));

        }

        return redirect('auth/logout');
    }

    public function update($id, PrototypeRequest $request) {

        if(Auth::user()->can('update-prototypes')) {

        $prototype = Prototype::findOrFail($id);

        $prototype->update($request->all());

        Session::flash('message', trans('car::ui.prototype.message_update', array('name' => $prototype->name)));

        return redirect('car/model');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-prototypes')) {

        $prototype = Prototype::findOrFail($id);

        Prototype::destroy($id);

        Session::flash('message', trans('car::ui.prototype.message_delete', array('name' => $prototype->name)));

        return redirect('car/model');

        }

        return redirect('auth/logout');
    }

}