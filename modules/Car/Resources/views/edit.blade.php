@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('car::ui.car.edit_car') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($car, ['method' => 'PUT', 'class' => 'cmxform form-horizontal', 'id' => 'carForm', 'route' => ['car.update', $car->id]]) !!}

                            @include('car::form', array('car' => $car) + compact('brands', 'prototypes', 'colors', 'conditions'), ['button' => trans('car::ui.car.button_update')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
@stop