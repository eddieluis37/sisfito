<?php namespace Modules\Client\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Client\Entities\Client;
use Modules\Client\Entities\Seccional;
use Modules\Client\Http\Requests\ClientRequest;
use Pingpong\Modules\Routing\Controller;

class ClientController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index(){

        if(Auth::user()->can('read-clients')) {

            $clients = Client::with('seccional')->get();

            return view('client::index', compact('clients'));

        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-clients')) {

            $seccionales = Seccional::orderBy('name', 'asc')->lists('name', 'id');

            return view('client::create', compact('seccionales'));
        }

        return redirect('auth/logout');
    }

    public function store(ClientRequest $request) {

        if(Auth::user()->can('create-clients')) {

            $data = Client::create($request->all());

            $client = Client::findOrFail($data->id);

            Session::flash('message', trans(
                    'client::ui.client.message_create', array('name' => $client->firstname.' '.$client->lastname))
            );

            return redirect('client/create');
        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-clients')) {

            $client = Client::findOrFail($id);

            $seccionales = Seccional::orderBy('name', 'asc')->lists('name', 'id');

            return view('client::edit', compact('client', 'seccionales'));
        }

        return redirect('auth/logout');
    }

    public function update($id, ClientRequest $request) {

        if(Auth::user()->can('update-clients')) {

            $client = Client::findOrFail($id);

            $client->update($request->all());

            Session::flash('message', trans(
                    'client::ui.client.message_update', array('name' => $client->firstname.' '.$client->lastname))
            );

            return redirect('client');
        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-clients')) {

            $client = Client::findOrFail($id);

            Client::destroy($id);

            Session::flash('message', trans(
                    'client::ui.client.message_delete', array('name' => $client->firstname.' '.$client->lastname))
            );

            return redirect('client');
        }

        return redirect('auth/logout');
    }
	
}