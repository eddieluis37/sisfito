@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('agreement::ui.status.edit_status') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($status, ['method' => 'PUT', 'route' => ['agreement.status.update', $status->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('agreement::status.form', ['button' => trans('agreement::ui.status.button_update')])

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