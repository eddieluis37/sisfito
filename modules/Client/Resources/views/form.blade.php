
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('client::ui.client.firstname_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('client::ui.client.lastname_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('client::ui.client.passport_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('passport', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('client::ui.seccional.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('seccionales_id', $seccionales, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}
