@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sampleones.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.sampleones.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.sampleones.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.sampleones.partials.sampleones-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="sampleones-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.sampleones.table.id') }}</th>
                            <th>{{ trans('labels.backend.sampleones.table.first_name') }}</th>
				<th>{{ trans('labels.backend.sampleones.table.datethree') }}</th>
				<th>{{ trans('labels.backend.sampleones.table.profile_pic') }}</th>
				<th>{{ trans('labels.backend.sampleones.table.profile_img') }}</th>
                            <th>{{ trans('labels.backend.sampleones.table.createdat') }}</th>
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
            var dataTable = $('#sampleones-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.sampleones.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.sampleones.table')}}.id'},
                    {data: 'first_name', name: '{{config('module.sampleones.table')}}.first_name'},
				{data: 'datethree', name: '{{config('module.sampleones.table')}}.datethree'},
				{data: 'profile_pic', name: '{{config('module.sampleones.table')}}.profile_pic'},
				{data: 'profile_img', name: '{{config('module.sampleones.table')}}.profile_img'},
                    {data: 'created_at', name: '{{config('module.sampleones.table')}}.created_at'},
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
