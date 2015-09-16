<?php namespace Modules\Client\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Client\Entities\Seccional;
use Modules\Client\Http\Requests\SeccionalRequest;
use Pingpong\Modules\Routing\Controller;

class SeccionalController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-Seccionales')) {

        $Seccionales = Seccional::all();

		return view('client::seccional.index', compact('Seccionales'));
        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-Seccionales')) {

            return view('client::seccional.create');
        }

        return redirect('auth/logout');
    }

    public function store(SeccionalRequest $request) {

        if(Auth::user()->can('create-Seccionales')) {

            $data = Seccional::create($request->all());

            $seccional = Seccional::findOrFail($data->id);

            Session::flash('message', trans('client::ui.seccional.message_create', array('name' => $seccional->name)));

            return redirect('client/seccional/create');
        }

        return redirect('auth/logout');
	
    }

    public function edit($id) {

        if(Auth::user()->can('update-Seccionales')) {

            $seccional = Seccional::findOrFail($id);

            return view('client::seccional.edit', compact('seccional'));
        }

        return redirect('auth/logout');
    }

    public function update($id, SeccionalRequest $request) {

        if(Auth::user()->can('update-Seccionales')) {

            $seccional = Seccional::findOrFail($id);

            $seccional->update($request->all());

            Session::flash('message', trans('client::ui.seccional.message_update', array('name' => $seccional->name)));

            return redirect('client/seccional');
        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-Seccionales')) {

        $seccional = Seccional::findOrFail($id);

        Seccional::destroy($id);

        Session::flash('message', trans('client::ui.seccional.message_delete', array('name' => $seccional->name)));

        return redirect('client/seccional');
        }

        return redirect('auth/logout');
    }
}