@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.samplefours.management') . ' | ' . trans('labels.backend.samplefours.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.samplefours.management') }}
        <small>{{ trans('labels.backend.samplefours.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($samplefour, ['route' => ['admin.samplefours.update', $samplefour], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-samplefour']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.samplefours.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.samplefours.partials.samplefours-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.samplefours.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.samplefours.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
