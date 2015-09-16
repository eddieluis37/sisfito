
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.brand.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.prototype.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('prototype_id', $prototypes, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.color.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('color_id', $colors, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.condition.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('condition_id', $conditions, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.car.sheet_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('sheet_number', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.car.quantity_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('quantity_km', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('car::ui.car.price_label') }}</label>
    <div class="col-lg-8">
        {!! Form::text('price_by_hour', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}