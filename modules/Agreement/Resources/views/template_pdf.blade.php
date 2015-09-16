<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <head>
        <style>
            .page-break {
                page-break-after: always;
            }

            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
            .table > thead > tr > th,
            .table > tbody > tr > th,
            .table > tfoot > tr > th,
            .table > thead > tr > td,
            .table > tbody > tr > td,
            .table > tfoot > tr > td {
                padding: 8px;
                line-height: 1.42857143;
                vertical-align: top;
                border-top: 1px solid #dddddd;
            }
            .table > thead > tr > th {
                vertical-align: bottom;
                border-bottom: 2px solid #dddddd;
            }
            .table > caption + thead > tr:first-child > th,
            .table > colgroup + thead > tr:first-child > th,
            .table > thead:first-child > tr:first-child > th,
            .table > caption + thead > tr:first-child > td,
            .table > colgroup + thead > tr:first-child > td,
            .table > thead:first-child > tr:first-child > td {
                border-top: 0;
            }
            .table > tbody + tbody {
                border-top: 2px solid #dddddd;
            }
            .table .table {
                background-color: #ffffff;
            }
        </style>

        <title>Pdf</title>
    </head>
    <body>
        <h1>Empresa de Alquier de Coches</h1>
        <h3>Reporte Contrato a Cliente</h3>
    <br>

    <div>
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('agreement::ui.agreement.code') }}</th>
                <th>{{ trans('client::ui.client.firstname_label') }}</th>
                <th>{{ trans('client::ui.client.lastname_label') }}</th>
                <th>{{ trans('client::ui.client.passport_label') }}</th>
                <th>{{ trans('seccional') }}</th>
                <th>{{ trans('car::ui.brand.name') }}</th>
                <th>{{ trans('car::ui.prototype.name') }}</th>
                <th>{{ trans('car::ui.color.name') }}</th>
                <th>{{ trans('agreement::ui.status.name') }}</th>
                <th>{{ trans('agreement::ui.agreement.registration_label') }}</th>
                <th>{{ trans('agreement::ui.agreement.delivery_label') }}</th>
                <th>{{ trans('agreement::ui.agreement.cash_label') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="gradeX">
                <td>{{ $data[0]->code }}</td>
                <td>{{ $data[0]->firstname }}</td>
                <td>{{ $data[0]->lastname }}</td>
                <td>{{ $data[0]->passport }}</td>
                <td>{{ $data[0]->seccional }}</td>
                <td>{{ $data[0]->brand }}</td>
                <td>{{ $data[0]->model }}</td>
                <td>{{ $data[0]->color }}</td>
                <td>{{ $data[0]->status }}</td>
                <td>{{ $data[0]->registration_date }}</td>
                <td>{{ $data[0]->delivery_date }}</td>
                <td>{{ $data[0]->cash }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </body>
</html>