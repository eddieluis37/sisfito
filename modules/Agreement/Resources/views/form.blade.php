
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('client::ui.client.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.car.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('car_id', $cars, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 col-sm-2">{{ trans('agreement::ui.agreement.registration_label') }}</label>
    <div class="col-lg-8">
        <div class="input-group input-large custom-date-range">

            {!! Form::text('registration_date', null, ['class' => 'form-control form_datetime']) !!}

            <span class="input-group-addon">{{ trans('agreement::ui.agreement.to_label') }}</span>

            {!! Form::text('delivery_date', null, ['class' => 'form-control form_datetime']) !!}

        </div>
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('agreement::ui.status.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('status_id', $status, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}