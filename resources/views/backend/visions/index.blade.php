@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.visions.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.visions.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.visions.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.visions.partials.visions-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="visions-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.visions.table.id') }}</th>
                            <th>{{ trans('labels.backend.visions.table.vision_name') }}</th>
				<th>{{ trans('labels.backend.visions.table.since') }}</th>
				<th>{{ trans('labels.backend.visions.table.notes') }}</th>
				<th>{{ trans('labels.backend.visions.table.company') }}</th>
				<th>{{ trans('labels.backend.visions.table.associated_roles') }}</th>
				<th>{{ trans('labels.backend.visions.table.dateone') }}</th>
				<th>{{ trans('labels.backend.visions.table.profile_pic') }}</th>
                            <th>{{ trans('labels.backend.visions.table.createdat') }}</th>
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
            var dataTable = $('#visions-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.visions.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.visions.table')}}.id'},
                    {data: 'vision_name', name: '{{config('module.visions.table')}}.vision_name'},
				{data: 'since', name: '{{config('module.visions.table')}}.since'},
				{data: 'notes', name: '{{config('module.visions.table')}}.notes'},
				{data: 'company', name: '{{config('module.visions.table')}}.company'},
				{data: 'associated_roles', name: '{{config('module.visions.table')}}.associated_roles'},
				{data: 'dateone', name: '{{config('module.visions.table')}}.dateone'},
				{data: 'profile_pic', name: '{{config('module.visions.table')}}.profile_pic'},
                    {data: 'created_at', name: '{{config('module.visions.table')}}.created_at'},
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
