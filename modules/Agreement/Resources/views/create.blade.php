@extends('layouts.master')

@section('style')
    <link href="{{ asset('js/bootstrap-datetimepicker/css/datetimepicker-custom.css') }}" rel="stylesheet" />
@stop

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('agreement::ui.agreement.new_agreement') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::open(array('route' => 'agreement.store', 'class' => 'cmxform form-horizontal', 'id' => 'agreementForm')) !!}

                            @include('agreement::form', ['button' => trans('agreement::ui.agreement.button_add')])

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
    <script src="{{ asset('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/pickers-init.js') }}"></script>
@stop