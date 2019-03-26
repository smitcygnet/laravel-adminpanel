@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sampletwos.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.sampletwos.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.sampletwos.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.sampletwos.partials.sampletwos-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="sampletwos-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.sampletwos.table.id') }}</th>
                            <th>{{ trans('labels.backend.sampletwos.table.first_name') }}</th>
				<th>{{ trans('labels.backend.sampletwos.table.active') }}</th>
				<th>{{ trans('labels.backend.sampletwos.table.confirmed') }}</th>
                            <th>{{ trans('labels.backend.sampletwos.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#sampletwos-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.sampletwos.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.sampletwos.table')}}.id'},
                    {data: 'first_name', name: '{{config('module.sampletwos.table')}}.first_name'},
				{data: 'active', name: '{{config('module.sampletwos.table')}}.active'},
				{data: 'confirmed', name: '{{config('module.sampletwos.table')}}.confirmed'},
                    {data: 'created_at', name: '{{config('module.sampletwos.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
