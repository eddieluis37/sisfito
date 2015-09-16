@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('car::ui.brand.edit_brand') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($brand, ['method' => 'PUT', 'route' => ['car.brand.update', $brand->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('car::brand.form', ['button' => trans('car::ui.brand.button_update')])

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