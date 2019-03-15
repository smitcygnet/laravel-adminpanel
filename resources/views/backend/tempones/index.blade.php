@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.tempones.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.tempones.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.tempones.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.tempones.partials.tempones-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="tempones-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.tempones.table.id') }}</th>
                            <th>{{ trans('labels.backend.tempones.table.first_name') }}</th>
				<th>{{ trans('labels.backend.tempones.table.last_name') }}</th>
				<th>{{ trans('labels.backend.tempones.table.age') }}</th>
				<th>{{ trans('labels.backend.tempones.table.comment') }}</th>
				<th>{{ trans('labels.backend.tempones.table.dropdown') }}</th>
				<th>{{ trans('labels.backend.tempones.table.explaination') }}</th>
				<th>{{ trans('labels.backend.tempones.table.gender') }}</th>
				<th>{{ trans('labels.backend.tempones.table.associated_roles') }}</th>
				<th>{{ trans('labels.backend.tempones.table.dataone') }}</th>
				<th>{{ trans('labels.backend.tempones.table.datetwo') }}</th>
				<th>{{ trans('labels.backend.tempones.table.datethree') }}</th>
				<th>{{ trans('labels.backend.tempones.table.profile_pic') }}</th>
				<th>{{ trans('labels.backend.tempones.table.profile_img') }}</th>
                            <th>{{ trans('labels.backend.tempones.table.createdat') }}</th>
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
            var dataTable = $('#tempones-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.tempones.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.tempones.table')}}.id'},
                    {data: 'first_name', name: '{{config('module.tempones.table')}}.first_name'},
				{data: 'last_name', name: '{{config('module.tempones.table')}}.last_name'},
				{data: 'age', name: '{{config('module.tempones.table')}}.age'},
				{data: 'comment', name: '{{config('module.tempones.table')}}.comment'},
				{data: 'dropdown', name: '{{config('module.tempones.table')}}.dropdown'},
				{data: 'explaination', name: '{{config('module.tempones.table')}}.explaination'},
				{data: 'gender', name: '{{config('module.tempones.table')}}.gender'},
				{data: 'associated_roles', name: '{{config('module.tempones.table')}}.associated_roles'},
				{data: 'dataone', name: '{{config('module.tempones.table')}}.dataone'},
				{data: 'datetwo', name: '{{config('module.tempones.table')}}.datetwo'},
				{data: 'datethree', name: '{{config('module.tempones.table')}}.datethree'},
				{data: 'profile_pic', name: '{{config('module.tempones.table')}}.profile_pic'},
				{data: 'profile_img', name: '{{config('module.tempones.table')}}.profile_img'},
                    {data: 'created_at', name: '{{config('module.tempones.table')}}.created_at'},
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
