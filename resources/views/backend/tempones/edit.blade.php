@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.tempones.management') . ' | ' . trans('labels.backend.tempones.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.tempones.management') }}
        <small>{{ trans('labels.backend.tempones.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($tempone, ['route' => ['admin.tempones.update', $tempone], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PATCH', 'id' => 'edit-tempone']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.tempones.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.tempones.partials.tempones-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.tempones.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.tempones.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
