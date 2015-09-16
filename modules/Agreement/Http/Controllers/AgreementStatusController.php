<?php namespace Modules\Agreement\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Agreement\Entities\AgreementStatus;
use Modules\Agreement\Http\Requests\AgreementStatusRequest;
use Pingpong\Modules\Routing\Controller;

class AgreementStatusController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-status')) {

            $status = AgreementStatus::all();

            return view('agreement::status.index', compact('status'));
        }

        return redirect('auth/logout');
	}

    public function create() {

            if(Auth::user()->can('create-status')) {

            return view('agreement::status.create');
        }

        return redirect('auth/logout');
    }
    
    public function store(AgreementStatusRequest $request) {

        if(Auth::user()->can('create-status')) {
        
        $data = AgreementStatus::create($request->all());
        
        $status = AgreementStatus::findOrFail($data->id);

        Session::flash('message', trans('agreement::ui.status.message_create', array('name' => $status->name)));

        return redirect('agreement/status/create');
        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-status')) {

        $status = AgreementStatus::findOrFail($id);

        return view('agreement::status.edit', compact('status'));
        }

        return redirect('auth/logout');
    }

    public function update($id, AgreementStatusRequest $request) {

        if(Auth::user()->can('update-status')) {

        $status = AgreementStatus::findOrFail($id);

        $status->update($request->all());

        Session::flash('message', trans('agreement::ui.status.message_update', array('name' => $status->name)));

        return redirect('agreement/status');
        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-status')) {

        $status = AgreementStatus::findOrFail($id);

        AgreementStatus::destroy($id);

        Session::flash('message', trans('agreement::ui.status.message_delete', array('name' => $status->name)));

        return redirect('agreement/status');
        }

        return redirect('auth/logout');
    }
	
}