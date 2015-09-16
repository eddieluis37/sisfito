<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Condition;
use Modules\Car\Http\Requests\ConditionRequest;
use Pingpong\Modules\Routing\Controller;

class ConditionController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-conditions')) {

        $conditions = Condition::all();

		return view('car::condition.index', compact('conditions'));

        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-conditions')) {

        return view('car::condition.create');

        }

        return redirect('auth/logout');
    }

    public function store(ConditionRequest $request) {

        if(Auth::user()->can('create-conditions')) {

        $data = Condition::create($request->all());

        $condition = Condition::findOrFail($data->id);

        Session::flash('message', trans('car::ui.condition.message_create', array('name' => $condition->name)));

        return redirect('car/condition/create');

        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-conditions')) {

        $condition = Condition::findOrFail($id);

        return view('car::condition.edit', compact('condition'));

        }

        return redirect('auth/logout');
    }

    public function update($id, ConditionRequest $request) {

        if(Auth::user()->can('update-conditions')) {

        $condition = Condition::findOrFail($id);

        $condition->update($request->all());

        Session::flash('message', trans('car::ui.condition.message_update', array('name' => $condition->name)));

        return redirect('car/condition');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-conditions')) {

        $condition = Condition::findOrFail($id);

        Condition::destroy($id);

        Session::flash('message', trans('car::ui.condition.message_delete', array('name' => $condition->name)));

        return redirect('car/condition');

        }

        return redirect('auth/logout');
    }
	
}