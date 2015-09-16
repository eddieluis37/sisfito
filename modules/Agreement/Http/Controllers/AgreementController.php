<?php namespace Modules\Agreement\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Agreement\Entities\Agreement;
use Modules\Agreement\Entities\AgreementStatus;
use Modules\Agreement\Http\Requests\AgreementRequest;
use Modules\Car\Entities\Car;
use Modules\Client\Entities\Client;
use Pingpong\Modules\Routing\Controller;

class AgreementController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        if(Auth::user()->can('read-agreements')) {

            $agreements = Agreement::all();

            return view('agreement::index', compact('agreements'));
        }

        return redirect('auth/logout');
    }

    public function create() {

        if(Auth::user()->can('create-agreements')) {

            $clients = Client::orderBy('lastname', 'asc')->lists('lastname', 'id');

            $cars = Car::orderBy('sheet_number', 'asc')->lists('sheet_number', 'id');

            $status = AgreementStatus::orderBy('name', 'asc')->lists('name', 'id');

            return view('agreement::create', compact('clients', 'cars', 'status'));
        }

        return redirect('auth/logout');
    }

    public function store(AgreementRequest $request) {

        if(Auth::user()->can('create-agreements')) {

            $registration_date = Carbon::createFromTimestamp(strtotime($request->input('registration_date')));
            $delivery_date = Carbon::createFromTimestamp(strtotime($request->input('delivery_date')));

            $price = Car::findOrFail($request->input('car_id'));

            $data = Agreement::create([
                'code'      => $this->generateCode(2,4),
                'client_id' =>  $request->input('client_id'),
                'car_id' =>  $request->input('car_id'),
                'status_id' =>  $request->input('status_id'),
                'registration_date' =>  $request->input('registration_date'),
                'delivery_date' =>  $request->input('delivery_date'),
                'cash' =>  $price->price_by_hour * $registration_date->diffInHours($delivery_date),
            ]);

            $agreement = Agreement::findOrFail($data->id);

            Session::flash('message', trans(
                    'agreement::ui.agreement.message_create', array(
                    'code' => $agreement->code,
                    'name' => $agreement->client->firstname.' '.$agreement->client->lastname))
            );

            return redirect('agreement/create');
        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-agreements')) {

            $agreement = Agreement::findOrFail($id);

            $clients = Client::orderBy('lastname', 'asc')->lists('lastname', 'id');

            $cars = Car::orderBy('sheet_number', 'asc')->lists('sheet_number', 'id');

            $status = AgreementStatus::orderBy('name', 'asc')->lists('name', 'id');

            return view('agreement::edit', compact('agreement', 'clients', 'cars', 'status'));
        }

        return redirect('auth/logout');
    }

    public function update($id, AgreementRequest $request) {

        if(Auth::user()->can('update-agreements')) {

            $registration_date = Carbon::createFromTimestamp(strtotime($request->input('registration_date')));
            $delivery_date = Carbon::createFromTimestamp(strtotime($request->input('delivery_date')));

            $price = Car::findOrFail($request->input('car_id'));

            $agreement = Agreement::findOrFail($id);

            $agreement->update([
                'code'      => $agreement->code,
                'client_id' =>  $request->input('client_id'),
                'car_id' =>  $request->input('car_id'),
                'status_id' =>  $request->input('status_id'),
                'registration_date' =>  $request->input('registration_date'),
                'delivery_date' =>  $request->input('delivery_date'),
                'cash' =>  $price->price_by_hour * $registration_date->diffInHours($delivery_date),
            ]);

            Session::flash('message', trans(
                    'agreement::ui.agreement.message_update', array(
                    'code' => $agreement->code,
                    'name' => $agreement->client->firstname.' '.$agreement->client->lastname))
            );

            return redirect('agreement');

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-agreements')) {

            $agreement = Agreement::findOrFail($id);

            Agreement::destroy($id);

            Session::flash('message', trans(
                    'agreement::ui.agreement.message_delete', array(
                    'code' => $agreement->code,
                    'name' => $agreement->client->firstname.' '.$agreement->client->lastname))
            );

            return redirect('agreement');
        }

        return redirect('auth/logout');
    }

    public function printPdf($id) {

        $data = Agreement::getAgreementById($id);

        $pdf = \PDF::loadView('agreement::template_pdf', array('data' => $data))
                ->setOrientation('landscape');
        return $pdf->stream();
    }

    private function generateRandomString($length) {
        $pattern = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateRandomNumber($length) {
        $pattern = "0123456789";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateCode($lengthString, $lengthNumber) {
        return $this->generateRandomString($lengthString).$this->generateRandomNumber($lengthNumber);
    }
	
}