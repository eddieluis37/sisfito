@extends('layouts.master')

@section('style')
    <link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
@stop

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">
        @include('partials.message')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('car::ui.car.names') }}
                        <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-cars'))
                            <a href="{{ url('car/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("car::ui.car.button_add") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('car::ui.brand.name') }}</th>
                                    <th>{{ trans('car::ui.prototype.name') }}</th>
                                    <th>{{ trans('car::ui.color.name') }}</th>
                                    <th>{{ trans('car::ui.condition.name') }}</th>
                                    <th>{{ trans('car::ui.car.sheet_label') }}</th>
                                    <th>{{ trans('car::ui.car.quantity_label') }}</th>
                                    <th>{{ trans('car::ui.car.price_label') }}</th>
                                    @if(Auth::user()->can(['update-cars', 'delete-cars']))
                                    <th>{{ trans('car::ui.car.operation_label') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr class="gradeX">
                                        <td>{{ $car->brand->name }}</td>
                                        <td>{{ $car->prototype->name }}</td>
                                        <td>{{ $car->color->name }}</td>
                                        <td>{{ $car->condition->name }}</td>
                                        <td>{{ $car->sheet_number }}</td>
                                        <td>{{ $car->quantity_km }}</td>
                                        <td>{{ $car->price_by_hour }}</td>
                                        @if(Auth::user()->can(['update-cars', 'delete-cars']))
                                        <td>
                                            <p>
                                                @if(Auth::user()->can('update-cars'))
                                                <a href="{{ url('car/' . $car->id . '/edit') }}">
                                                    <button class="btn btn-info " type="button"><i class="fa fa-refresh"></i> {{ trans('car::ui.car.button_update') }}</button>
                                                </a>
                                                @endif

                                                    @if(Auth::user()->can('delete-cars'))
                                                {!! Form::open(['url' => 'car/'. $car->id, 'method' => 'delete']) !!}
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-times-circle"></i> {{ trans('car::ui.car.button_delete') }}</button>
                                                {!! Form::close() !!}
                                                    @endif
                                            </p>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('car::ui.brand.name') }}</th>
                                    <th>{{ trans('car::ui.prototype.name') }}</th>
                                    <th>{{ trans('car::ui.color.name') }}</th>
                                    <th>{{ trans('car::ui.condition.name') }}</th>
                                    <th>{{ trans('car::ui.car.sheet_label') }}</th>
                                    <th>{{ trans('car::ui.car.quantity_label') }}</th>
                                    <th>{{ trans('car::ui.car.price_label') }}</th>
                                    @if(Auth::user()->can(['update-cars', 'delete-cars']))
                                        <th>{{ trans('car::ui.car.operation_label') }}</th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('script')
    <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop