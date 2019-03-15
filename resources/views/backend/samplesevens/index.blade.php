@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.samplesevens.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.samplesevens.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.samplesevens.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.samplesevens.partials.samplesevens-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="samplesevens-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.samplesevens.table.id') }}</th>
                            <th>{{ trans('labels.backend.samplesevens.table.first_name') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.last_name') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.age') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.comment') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.dropdown') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.explaination') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.gender') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.associated_roles') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.dataone') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.datetwo') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.datethree') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.profile_pic') }}</th>
				<th>{{ trans('labels.backend.samplesevens.table.profile_img') }}</th>
                            <th>{{ trans('labels.backend.samplesevens.table.createdat') }}</th>
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
            var dataTable = $('#samplesevens-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.samplesevens.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.samplesevens.table')}}.id'},
                    {data: 'first_name', name: '{{config('module.samplesevens.table')}}.first_name'},
				{data: 'last_name', name: '{{config('module.samplesevens.table')}}.last_name'},
				{data: 'age', name: '{{config('module.samplesevens.table')}}.age'},
				{data: 'comment', name: '{{config('module.samplesevens.table')}}.comment'},
				{data: 'dropdown', name: '{{config('module.samplesevens.table')}}.dropdown'},
				{data: 'explaination', name: '{{config('module.samplesevens.table')}}.explaination'},
				{data: 'gender', name: '{{config('module.samplesevens.table')}}.gender'},
				{data: 'associated_roles', name: '{{config('module.samplesevens.table')}}.associated_roles'},
				{data: 'dataone', name: '{{config('module.samplesevens.table')}}.dataone'},
				{data: 'datetwo', name: '{{config('module.samplesevens.table')}}.datetwo'},
				{data: 'datethree', name: '{{config('module.samplesevens.table')}}.datethree'},
				{data: 'profile_pic', name: '{{config('module.samplesevens.table')}}.profile_pic'},
				{data: 'profile_img', name: '{{config('module.samplesevens.table')}}.profile_img'},
                    {data: 'created_at', name: '{{config('module.samplesevens.table')}}.created_at'},
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
