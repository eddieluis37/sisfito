@extends('layouts.master')

@section('style')
    <link href="{{ asset('js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('js/data-tables/DT_bootstrap.css') }}" />
@stop

        @section('content')

        <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('dashboard::ui.dash.unfulfilled_agreements') }}
                        <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('agreement::ui.agreement.code') }}</th>
                                    <th>{{ trans('agreement::ui.status.name') }}</th>
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.passport_label') }}</th>
                                    <th>{{ trans('seccional') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.registration_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.delivery_label') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($agreements as $data)
                                    <tr class="gradeX">
                                        <td>{{ $data->code}}</td>
                                        <td>{{ $data->status}}</td>
                                        <td>{{ $data->firstname}}</td>
                                        <td>{{ $data->lastname}}</td>
                                        <td>{{ $data->passport}}</td>
                                        <td>{{ $data->seccional}}</td>
                                        <td>{{ $data->registration_date}}</td>
                                        <td>{{ $data->delivery_date}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('agreement::ui.agreement.code') }}</th>
                                    <th>{{ trans('agreement::ui.status.name') }}</th>
                                    <th>{{ trans('client::ui.client.firstname_label') }}</th>
                                    <th>{{ trans('client::ui.client.lastname_label') }}</th>
                                    <th>{{ trans('client::ui.client.passport_label') }}</th>
                                    <th>{{ trans('client::ui.seccional.name') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.registration_label') }}</th>
                                    <th>{{ trans('agreement::ui.agreement.delivery_label') }}</th>
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