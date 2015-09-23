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
                        {{ trans('client::ui.client.names') }}
                        <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-clients'))
                                <a href="{{ url('client/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("client::ui.client.button_add") }}</button></a>
                                <a href="{{ url('client/show') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("client::ui.client.button_trashed") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.identificacion_label') }}</th>
                                    <th>{{ trans('client::ui.seccional.name') }}</th>
                                    <th>{{ trans('client::ui.client.productor_label') }}</th>
                                    <th>{{ trans('client::ui.client.exportador_label') }}</th>
                                    <th>{{ trans('client::ui.client.importador_label') }}</th>
                                    @if(Auth::user()->can(['update-clients', 'delete-clients']))
                                    <th>{{ trans('client::ui.client.operation_label') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr class="gradeX">
                                        <td>{{ $client->firstname }}</td>
                                        <td>{{ $client->lastname }}</td>
                                        <td>{{ $client->identificacion }}</td>
                                        <td>{{ $client->seccional->name }}</td>
                                        <td>{{ $client->productor}}</td>
                                        <td>{{ $client->exportador}}</td>
                                        <td>{{ $client->importador}}</td>
                                        @if(Auth::user()->can(['update-clients', 'delete-clients']))
                                        <td>
                                            <p>
                                                @if(Auth::user()->can('update-clients'))
                                                <a href="{{ url('client/' . $client->id . '/edit') }}">
                                                    <button class="btn btn-info " type="button"><i class="fa fa-refresh"></i> {{ trans('client::ui.client.button_update') }}</button>
                                                </a>
                                                @endif

                                                    @if(Auth::user()->can('delete-clients'))
                                                {!! Form::open(['url' => 'client/'. $client->id, 'method' => 'delete']) !!}
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-times-circle"></i> {{ trans('client::ui.client.button_delete') }}</button>
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
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.identificacion_label') }}</th>
                                    <th>{{ trans('client::ui.seccional.name') }}</th>
                                    @if(Auth::user()->can(['update-clients', 'delete-clients']))
                                    <th>{{ trans('client::ui.client.operation_label') }}</th>
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